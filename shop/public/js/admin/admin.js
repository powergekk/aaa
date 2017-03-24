$(function(){

	/*商品分类 start*/
        // 二级内容的显隐
        $("body").on('click','.arrow-bg',function(){
            var that = $(this);
            var subDetail = $(this).parents(".goods-item").find(".sub-category");
            subDetail.slideToggle("fast","swing",function(){
                if(subDetail.is(':hidden')){
                    that.removeClass("arrow-up").addClass("arrow-down");
                }else{
                    that.removeClass("arrow-down").addClass("arrow-up");
                }
            });
        })

        // 添加分类
        $("#add-category").click(function(){

            var unSavedLi = $(".goods-content li.unsaved").length;
            if(unSavedLi > 0){
                alert('有未保存的分类，请先保存再添加!');
                return;
            }
            var appendUl = $(".goods-content");
            var appendHtml = '<li class="goods-item unsaved">';
            appendHtml += '<div class="show-item">';
            appendHtml += '<div class="col-1">';
            appendHtml += '<span class="arrow-bg arrow-down"></span>';
            appendHtml += '<input type="text" data-id="0" data-parentId="0" value=""> ';
            appendHtml += '<a class="save save-category btn btn-default btn-sm"  href="javascript:;">保存</a>';
            appendHtml += '</div>';
            appendHtml += '<div class="col-2"></div>';
            appendHtml += '<div class="col-3">';
            appendHtml += '<a href="javascript:;" class="unsave-del btn btn-info btn-sm">删除</a>';
            appendHtml += '</div>';
            appendHtml += '</div>';
            appendHtml += '<div class="sub-category">';
            appendHtml += '<ul class="item-detail">';
            appendHtml += '</ul>';
            appendHtml += '<div class="btns">';
            appendHtml += '<a class="add-sub-category btn btn-info btn-sm" href="javascript:;">添加子分类</a>';
            appendHtml += '</div>';
            appendHtml += '</div>';

            appendUl.append(appendHtml);
        });

        // 添加子分类
        $("body").on('click','.add-sub-category',function(){
            var unSavedLi = $(".goods-content li.unsaved").length;
            if(unSavedLi > 0){
                alert('有未保存的分类，请先保存再添加!');
                return;
            }
            var parentId = $(this).attr('data-parentId');
            var appendSubHtml = '<li class="unsaved">';
            appendSubHtml += '<div class="col-1">';
            appendSubHtml += '<input class="detail-txt"  data-id="0" data-parentId=' +parentId+ ' type="text" value=""> ';
            appendSubHtml += '<a class="save save-category btn btn-default btn-sm" href="javascript:;">保存</a>';
            appendSubHtml += '</div>';
            appendSubHtml += '<div class="col-2"></div>';
            appendSubHtml += '<div class="col-3">';
            appendSubHtml += '<a href="javascript:;" class="unsave-del btn btn-info btn-sm">删除</a>';
            appendSubHtml += '</div>';
            appendSubHtml += '</li>';

            $(this).parents(".sub-category").find(".item-detail").append(appendSubHtml);

        });

        //未保存删除
        $("body").on('click','.unsave-del',function(){
            $(".goods-content li.unsaved").remove();
        })

        //保存分类
        $("body").on('click','.save-category',function(){
            var name = $(this).prev('input').val();
            var id = $(this).prev('input').attr('data-id');
            var parentId = $(this).prev('input').attr('data-parentId');
            var getUrl = "updatecategory";

            if(name.length<2){
                alert('分类名长度应大于2个汉字');
                return;
            }else if(name.length>8){
                alert('分类名最长8个汉字.');
                return;
            }

            $.get(getUrl,{id:id,parentId:parentId,name:name},function(data){
                if(data.status == 1){
                    window.location.reload();
                }else{
                    alert(data.msg);
                }
            },'json');

        });

        //背景样式
        $(".show-item,.item-detail li").mouseover(function(){
            $(this).css('backgroundColor','#f2f2f2');
        }).mouseout(function(){
            $(this).css('backgroundColor','');
        });

        //显示隐藏分类
        $("body").on('click','.changeCategoryStatus',function(){
          if(confirm('确定要更改该分类状态?')){

              var id = $(this).attr('data-id');
              var status = $(this).attr('data-status');
              var getUrl = "changeCategoryStatus";

              if(status == 1){//如果是子分类修改状态为显示，如果父分类为隐藏状态，则不能改为显示
                  if($(this).hasClass('cannotshow')){
                      alert('请先显示上级分类，再显示子分类！');
                      return;
                  }
              }

              $.get(getUrl,{id:id,status:status},function(data){
                  if(data.status == 1){
                      window.location.reload();
                  }else{
                      alert(data.msg);
                      window.location.reload();
                  }
              },'json');
          }

        });
        //商品分类 end/


})