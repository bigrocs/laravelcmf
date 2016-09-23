var dropzoneUrl = $("#uploadDropzone").attr("dropzoneUrl");
var dropzoneMaxFilesize = $("#uploadDropzone").attr("dropzoneMaxFilesize");
var dropzoneCsrfToken = $("#uploadDropzone").attr("dropzoneCsrfToken");
var dropzoneId;
var dropzoneName;
var maxFiles;
$("#uploadDropzone").click(function(){
    dropzoneId = $(this).attr("dropzoneId");
    dropzoneName = $(this).attr("dropzoneName");
    maxFiles = $(this).attr("dropzoneMaxFiles");
});
Dropzone.autoDiscover = false;
$(".dropzone").dropzone({
      url: dropzoneUrl,
      maxFilesize: dropzoneMaxFilesize,  // MB
      acceptedFiles: ".jpg,.jpeg,.png,.gif,.bmp",
      addRemoveLinks: true,
      clickable: true,
      autoProcessQueue: true, //关闭自动上传, 手动调度
      uploadMultiple: false,
      parallelUploads: 10, //最大并行处理量
      maxFiles: maxFiles,  //最大上传数量
      headers: {"X-CSRF-TOKEN": dropzoneCsrfToken},
      //插件消息翻译
      dictInvalidFileType: '上传图片格式错误',
      dictFileTooBig: '图片超出最大2M约束',
      dictMaxFilesExceeded: '超出最大上传数量',
      dictCancelUpload: '取消上传',
      dictRemoveFile: '去除文件',
      dictCancelUploadConfirmation: '确认取消上传',
       //监听
      init: function() {
          this.on("success", function(file,data) {
               //改变显示图片
              var $imgHtml = $(
                      '<div id="upload_box_'+dropzoneId+' class="col-xs-12">'+
                          '<div class="alert thumbnail col-lg-2 col-md-3 col-sm-4 col-xs-6" role="alert">' +
                              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+
                              '<img src="'+data.uploadData.url+'">'+
                          '</div>'+
                      '</div>'
                  );
              $("#upload_box_"+dropzoneId).replaceWith( $imgHtml );
              //改变from表单图片ID
              $("input[name='"+dropzoneName+"']").val(data.uploadData.id);
          });
      }
});
