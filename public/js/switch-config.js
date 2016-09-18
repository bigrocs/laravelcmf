$('.make-switch').bootstrapSwitch({
    onColor: "success",
    offColor: "danger",
    onText: "开启",
    offText: '关闭',
    onSwitchChange: function(event, state) {
        var id = $(this).attr("id");
        if(state){
            $("input[name='"+id+"']").val('on');
        }else{
            $("input[name='"+id+"']").val('off');
        }
      }
});
