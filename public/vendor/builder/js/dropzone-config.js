Dropzone.autoDiscover = false;
$(document).on('click', '.uploadDropzone', function() {

    var dropzoneUrl = $(this).attr("dropzoneUrl");
    var dropzoneMaxFilesize = $(this).attr("dropzoneMaxFilesize");
    var dropzoneCsrfToken = $(this).attr("dropzoneCsrfToken");
    var dropzoneId = $(this).attr("dropzoneId");
    var dropzoneName = $(this).attr("dropzoneName");
    var maxFiles = $(this).attr("dropzoneMaxFiles");
    var acceptedFiles = $(this).attr("dropzoneAcceptedFiles");

    $("#dropzone_"+dropzoneId).dropzone({
          url: dropzoneUrl,
          maxFilesize: dropzoneMaxFilesize,  // MB
          acceptedFiles: acceptedFiles,
          addRemoveLinks: true,
          clickable: true,
          autoProcessQueue: true, //关闭自动上传, 手动调度
          uploadMultiple: false,
          parallelUploads: 10, //最大并行处理量
          maxFiles: maxFiles,  //最大上传数量
          headers: {"X-CSRF-TOKEN": dropzoneCsrfToken},
          //插件消息翻译
          dictInvalidFileType: '上传图片格式错误',
          dictFileTooBig: '图片超出最大'+dropzoneMaxFilesize+'M约束',
          dictMaxFilesExceeded: '超出最大上传数量',
          dictCancelUpload: '取消上传',
          dictRemoveFile: '去除文件',
          dictCancelUploadConfirmation: '确认取消上传',
           //监听
          init: function() {
              this.on("success", function(file,data) {
                   //改变显示图片
                  var $imgHtml = $(
                          '<div id="upload_box_'+dropzoneId+'" class="col-xs-12">'+
                              '<div class=" col-lg-2 col-md-3 col-sm-4 col-xs-6">'+
                                  '<div class="box box-info">'+
                                      '<div class="box-header with-border">'+
                                        '<h3 class="box-title">'+data.uploadData.name+'</h3>'+
                                        '<div class="box-tools pull-right">'+
                                          '<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>'+
                                          '</button>'+
                                          '<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>'+
                                        '</div>'+
                                      '</div>'+
                                      '<div class="box-body">'+
                                          '<img class="img-responsive" src="'+data.uploadData.url+'">'+
                                      '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'
                      );
                  $("#upload_box_"+dropzoneId).replaceWith( $imgHtml );
                  //改变from表单图片ID
                  $("input[name='"+dropzoneName+"']").val(data.uploadData.id);
              });
          }
    });
});
