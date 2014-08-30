<?php
namespace Admin\Controller;
use Think\Controller;

class PublicController extends Controller{
	//文件上传
	public function fileUpload(){
		$Upload=new \Think\Upload(C('FILE_UPLOAD'));
		$info=$Upload->upload();
		if(!$info){
			$this->error($Upload->getError());
		}else{
			$imgPath='Uploads/'.$info['picUpload']['savepath'].$info['picUpload']['savename'];
			$type=array();
			switch(I('get.tb')){
				case 2:
					$type['width']=150;
					$type['height']=150;
					break;
				case 1:
					echo '150x150';
					break;
				default:
					echo 'nothing';
			}
			if($this->imageCrop($imgPath, $type)){
				unlink($imgPath);
				echo $this->getPath($imgPath, $type);
			}
		}
	}
	//图片裁剪
	private function imageCrop($imgUrl,$type){
		$Img=new \Think\Image();
		//打开图片
		$Img->open($imgUrl);		
		//居中生成缩略图
		$Img->thumb($type['width'],$type['height'],\Think\Image::IMAGE_THUMB_CENTER)->save($this->getPath($imgUrl, $type));
		return true;
	}
	//生成缩略图地址
	private function getPath($imgUrl,$type){
		//处理图片路径
		$srcArray=explode('.', $imgUrl);
		if(isset($type)){
			$imgUrl=$srcArray[0].'!'.$type['width'].'x'.$type['height'].'.'.$srcArray[1];
		}
		
		return $imgUrl;
	}
	//ckeditor图片处理
	public function ckeditor(){
		if(isset($_FILES['upload']['tmp_name'])){
			$Upload=new \Think\Upload(C('FILE_UPLOAD'));
			$info=$Upload->upload();

			if(!$info){
				$this->error($Upload->getError());
			}else{
				$imgPath='Uploads/'.$info['upload']['savepath'].$info['upload']['savename'];
	
				$image = new \Think\Image();
				// 在图片左上角添加水印（水印文件位于./logo.png） 并保存为water.jpg
				$image->open($imgPath)->water('Public/Admin/images/water.png',\Think\Image::IMAGE_WATER_NORTHWEST)->save($imgPath);
				$ckefn = $_GET['CKEditorFuncNum'];
				$imgPath=__ROOT__.'/'.$imgPath;

				
				echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($ckefn,\"$imgPath\",'图片上传成功！');</script>";
				exit();
			}
		}else{
			exit('警告：未知错误');
		}
	}
	
}