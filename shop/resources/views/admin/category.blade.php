@extends('admin.layouts.admin')
<div class="btns">
        <a id="add-category" class="add-category btn btn-info" href="javascript:;">添加分类</a>
    </div>
    <div class="goods-class">
        <div class="goods-header">
            <p class="col-1">　　　分类名称</p>
            <p class="col-3">操作</p>
        </div>
        <ul class="goods-content">

            @if(!empty($categoryList))
            @foreach ($categoryList as $list)
                    <!--外层分类start-->
            <li class="goods-item">
                <div class="show-item">
                    <div class="col-1">
                        <span class="arrow-bg arrow-down"></span>
                        <input type="text" data-id="{{$list['id']}}" data-parentId="0" value="{{$list['cat_name']}}">
                        <a class="save save-category btn btn-default btn-sm" href="javascript:;">保存</a>
                    </div>
                    <div class="col-3">
                        <a href="javascript:;"  class="changeCategoryStatus btn btn-info btn-sm" data-id="{{$list['id']}}" data-status="{{$list['is_show']}}">@if($list['is_show']==0)隐藏@else显示@endif</a>
                    </div>
                </div>
                <!--子分类start-->
                <div class="sub-category">
                    <ul class="item-detail">
                        @if(!empty($list['childs']))
                            @foreach ($list['childs'] as $sublist)
                                <li>
                                    <div class="col-1">
                                        <input data-id="{{$sublist['id']}}" data-parentId="{{$sublist['parent_id']}}" class="detail-txt" type="text" value="{{$sublist['cat_name']}}">
                                        <a class="save save-category btn btn-default btn-sm" href="javascript:;">保存</a>
                                    </div>
                                    <div class="col-3">
                                        <a href="javascript:;" class="changeCategoryStatus btn btn-info btn-sm  @if($list['is_show']==1)cannotshow @endif" data-id="{{$sublist['id']}}" data-status="{{$sublist['is_show']}}">@if($sublist['is_show'] ==0)隐藏@else显示@endif</a>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                    <!--添加子分类-->
                    <div class="btns">
                        <a class="add-sub-category btn btn-info" href="javascript:;" data-parentId="{{$list['id']}}">添加子分类</a>
                    </div>
                </div>
                <!--子分类end-->
            </li>
            <!--外层分类end-->
            @endforeach
            @endif

        </ul>
    </div>

