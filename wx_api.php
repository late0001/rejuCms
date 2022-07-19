<?php
include('system/conn.php');
$result = mysqli_query($conn, 'select * from rjcms_system where id = 1');
$row = mysqli_fetch_array($result);
$rjcms_domain = $row['s_domain'];
$rjcms_token= $row['s_token'];
$rjcms_guanzhu= $row['s_guanzhu'];
$rjcms_fengmian= $row['s_fengmian'];
							
define("yuming", $rjcms_domain);
define("guanzhu", $rjcms_guanzhu);
define("fengmian", $rjcms_fengmian);
/**
  * wechat php test
  */

//define your token
//weixinabc是一个token,是一个令牌
define("TOKEN", "".$rjcms_token."");
$wechatObj = new wechatCallbackapiTest();

if (isset($_GET['echostr'])) {
	$wechatObj->valid();
}
else {
	$wechatObj->responseMsg();
}


class wechatCallbackapiTest
{
	public function valid()
    {
        $echoStr = $_GET["echostr"];


        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }


    public function responseMsg()
    {

		$postStr = isset($GLOBALS["HTTP_RAW_POST_DATA"])?$GLOBALS["HTTP_RAW_POST_DATA"]:"";


		if (!empty($postStr)){

                libxml_disable_entity_loader(true);
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);

				$event = $postObj->Event;			
                $time = time();
                $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";    
				


				switch($postObj->MsgType)
				{
					case 'event':

						if($event == 'subscribe')
						{
						//关注后的回复
												$contentStr =guanzhu;


							$msgType = 'text';
							$textTpl = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
							echo $textTpl;

						}
						break;
					case 'text':
						if(preg_match('/[\x{4e00}-\x{9fa5}]+/u',$keyword))
						{	

							$newsTplHeader = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[news]]></MsgType>
							<ArticleCount>%s</ArticleCount>
							<Articles>";

							$newsTplItem = "<item>
							<Title><![CDATA[%s]]></Title> 
							<Description><![CDATA[%s]]></Description>
							<PicUrl><![CDATA[%s]]></PicUrl>
							<Url><![CDATA[%s]]></Url>
							</item>";
							$newsTplFooter="</Articles>
							</xml>";
 
									$vod = "SELECT * FROM `rjcms_vod` WHERE `d_name` like '%".$keyword."%'  LIMIT 0 , 10";

									$shipin= mysqli_query($conn, $vod);
									$itemCount = 0;
								if(mysqli_num_rows($shipin)>0){
								while($row = mysql_fetch_assoc($shipin))
								{

									$title = "".$row['d_name']."";
									$des ="";
									$url =yuming."bplay.php?play=".$row['d_id'];
									$picUrl1 ="".$row['d_picture']."";
									$contentStr .= sprintf($newsTplItem, $title, $des, $picUrl1, $url);																													
									++$itemCount;	
								}							
								$newsTplHeader = sprintf($newsTplHeader, $fromUsername, $toUsername, $time, $itemCount);
								$resultStr =  $newsTplHeader. $contentStr. $newsTplFooter;
								echo $resultStr; 
								}
								else
								{
									$newsTpl = "<xml>
										<ToUserName><![CDATA[%s]]></ToUserName>
										<FromUserName><![CDATA[%s]]></FromUserName>
										<CreateTime>%s</CreateTime>
										<MsgType><![CDATA[news]]></MsgType>
										<ArticleCount>1</ArticleCount>
										<Articles>
										<item>
										<Title><![CDATA[%s]]></Title> 
										<Description><![CDATA[%s]]></Description>
										<PicUrl><![CDATA[%s]]></PicUrl>
										<Url><![CDATA[%s]]></Url>
										</item>							
										</Articles>
										</xml>";						
								
								//没有查找到的时候的回复
										$title = '您要看的《'.$keyword.'》,在线给您找到以下结果：';
										
										$des1 ="";
										
										$picUrl1 =fengmian;
										
										$url=yuming."wxseacher.php?wd=".$keyword;

										$resultStr= sprintf($newsTpl, $fromUsername, $toUsername, $time, $title, $des1, $picUrl1, $url) ;
									
										echo $resultStr; 	

								}
										mysql_close($con);
									
								}																		
						else
						{
							$newsTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[news]]></MsgType>
							<ArticleCount>1</ArticleCount>
							<Articles>
							<item>
							<Title><![CDATA[%s]]></Title> 
							<Description><![CDATA[%s]]></Description>
							<PicUrl><![CDATA[%s]]></PicUrl>
							<Url><![CDATA[%s]]></Url>
							</item>							
							</Articles>
							</xml>";	
 						if($keyword=="1")
						{
										$title = '爆笑网剧：点击进入';
										
										$des1 ="";
										//图片地址
										$picUrl1 ="https://vthumb.ykimg.com/0541010159CF0F45ADC95B9B95D9DE4E";
										//跳转链接
										$url="http://www.keke6.com/wap/category/?11.html";

										$resultStr= sprintf($newsTpl, $fromUsername, $toUsername, $time, $title, $des1, $picUrl1, $url) ;
									
										echo $resultStr; 	
						}
						if($keyword=="2")
						{
										$title = '搞笑自拍：点击进入';
										
										$des1 ="";
										//图片地址
										$picUrl1 ="http://vthumb.ykimg.com/054101015A1776EC8B324C7E14DEE61E";
										//跳转链接
										$url="http://www.keke6.com/wap/category/?22.html";

										$resultStr= sprintf($newsTpl, $fromUsername, $toUsername, $time, $title, $des1, $picUrl1, $url) ;
									
										echo $resultStr; 	
						}
						if($keyword=="3")
						{
										$title = '恶搞配音：点击进入';
										
										$des1 ="";
										//图片地址
										$picUrl1 ="http://vthumb.ykimg.com/054101015A1B68AD8B7B448839ECE462";
										//跳转链接
										$url="http://www.keke6.com/wap/category/?33.html";

										$resultStr= sprintf($newsTpl, $fromUsername, $toUsername, $time, $title, $des1, $picUrl1, $url) ;
									
										echo $resultStr; 	
						}
						if($keyword=="4")
						{
										$title = '恶搞视频：点击进入';
										
										$des1 ="";
										//图片地址
										$picUrl1 ="http://vthumb.ykimg.com/054101015A1AD81F8B324C7E147312E7";
										//跳转链接
										$url="http://www.keke6.com/wap/category/?44.html";

										$resultStr= sprintf($newsTpl, $fromUsername, $toUsername, $time, $title, $des1, $picUrl1, $url) ;
									
										echo $resultStr; 	
						}
						if($keyword=="5")
						{
										$title = '损友恶搞：点击进入';
										
										$des1 ="";
										//图片地址
										$picUrl1 ="http://vthumb.ykimg.com/054101015A1957A38B7B448830C6BE89";
										//跳转链接
										$url="http://www.keke6.com/wap/category/?55.html";

										$resultStr= sprintf($newsTpl, $fromUsername, $toUsername, $time, $title, $des1, $picUrl1, $url) ;
									
										echo $resultStr; 	
						}
						if($keyword=="6")
						{
										$title = '幽默时刻：点击进入';
										
										$des1 ="";
										//图片地址
										$picUrl1 ="http://vthumb.ykimg.com/054101015A1B75758B324C7E1755597E";
										//跳转链接
										$url="http://www.keke6.com/wap/category/?66.html";

										$resultStr= sprintf($newsTpl, $fromUsername, $toUsername, $time, $title, $des1, $picUrl1, $url) ;
									
										echo $resultStr; 	
						}
						if($keyword=="7")
						{
										$title = '最强吐槽：点击进入';
										
										$des1 ="";
										//图片地址
										$picUrl1 ="http://vthumb.ykimg.com/054101015A1A4A6FE4DD0781B09D7B71";
										//跳转链接
										$url="http://www.keke6.com/wap/category/?111.html";

										$resultStr= sprintf($newsTpl, $fromUsername, $toUsername, $time, $title, $des1, $picUrl1, $url) ;
									
										echo $resultStr; 	
						}
						if($keyword=="8")
						{
										$title = '街访趣事：点击进入';
										
										$des1 ="";
										//图片地址
										$picUrl1 ="http://vthumb.ykimg.com/054101015A1A18ED8B324C7E11921D64";
										//跳转链接
										$url="http://www.keke6.com/wap/category/?222.html";

										$resultStr= sprintf($newsTpl, $fromUsername, $toUsername, $time, $title, $des1, $picUrl1, $url) ;
									
										echo $resultStr; 	
						}
						if($keyword=="9")
						{
										$title = '穿帮镜头：点击进入';
										
										$des1 ="";
										//图片地址
										$picUrl1 ="http://vthumb.ykimg.com/054104085A1B62AC00000139150C6498";
										//跳转链接
										$url="http://www.keke6.com/wap/category/?333.html";

										$resultStr= sprintf($newsTpl, $fromUsername, $toUsername, $time, $title, $des1, $picUrl1, $url) ;
									
										echo $resultStr; 	
						}
							if($keyword=="10")
						{
										$title = '奇闻趣事：点击进入';
										
										$des1 ="";
										//图片地址
										$picUrl1 ="http://vthumb.ykimg.com/054101015A1915158B7B448832DD7949";
										//跳转链接
										$url="http://www.keke6.com/wap/category/?444.html";

										$resultStr= sprintf($newsTpl, $fromUsername, $toUsername, $time, $title, $des1, $picUrl1, $url) ;
									
										echo $resultStr; 	
						}
								if($keyword=="11")
						{
										$title = '搞笑童趣：点击进入';
										
										$des1 ="";
										//图片地址
										$picUrl1 ="https://vthumb.ykimg.com/0541040858F217E5000001598C08C3DC";
										//跳转链接
										$url="http://www.keke6.com/wap/category/?555.html";

										$resultStr= sprintf($newsTpl, $fromUsername, $toUsername, $time, $title, $des1, $picUrl1, $url) ;
									
										echo $resultStr; 	
						}
							if($keyword=="12")
						{
										$title = '动物搞笑：点击进入';
										
										$des1 ="";
										//图片地址
										$picUrl1 ="http://vthumb.ykimg.com/054101015A0BA0CB8B7B44883D3D1E4C";
										//跳转链接
										$url="http://www.keke6.com/wap/category/?668.html";

										$resultStr= sprintf($newsTpl, $fromUsername, $toUsername, $time, $title, $des1, $picUrl1, $url) ;
									
										echo $resultStr; 	
						}
							if($keyword=="13")
						{
										$title = '相声视频：点击进入';
										
										$des1 ="";
										//图片地址
										$picUrl1 ="http://vthumb.ykimg.com/054101015A1B861FADCA61657322188D";
										//跳转链接
										$url="http://www.keke6.com/wap/category/?666.html";

										$resultStr= sprintf($newsTpl, $fromUsername, $toUsername, $time, $title, $des1, $picUrl1, $url) ;
									
										echo $resultStr; 	
						}
								if($keyword=="14")
						{
										$title = '小品视频：点击进入';
										
										$des1 ="";
										//图片地址
										$picUrl1 ="http://vthumb.ykimg.com/05410408598E7DF0000001240D0E6D7F";
										//跳转链接
										$url="http://www.keke6.com/wap/category/?667.html";

										$resultStr= sprintf($newsTpl, $fromUsername, $toUsername, $time, $title, $des1, $picUrl1, $url) ;
									
										echo $resultStr; 									
						}		
												$contentStr = "公众号提示： \r\n ●请回复输入电影名如：青云志 即可在线观看！\r\n ●如果无法获取；请稍等片刻重新回复！\r\n ◆友情提示：获取到地址后，直接点击进入，然后拖到播放列表下边，点击集数即可在线播放。\r\n  \r\n ★请回复片名或关键词！回复下方对应数字可进入目录。\r\n ❶=电影 ❷=电视剧 ❸=综艺 ❹=动漫 ❺=直播";


							$msgType = 'text';
							$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
							echo $resultStr;
						}					
						
						
						break;
					default:
						break;
				}						

        }else {
        	echo $rjcms_guanzhu;
        	exit;
        }
    }
		
	private function checkSignature()
	{
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }
        
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
}

?>
