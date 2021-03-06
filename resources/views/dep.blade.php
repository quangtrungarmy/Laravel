@extends('master')

@section('content')
	<b class='title'>{{trans('common.departments_cap')}}</b>
	<div style="height:30px"></div>

	<div layout="row" layout-align="space-between none">
		<div>
			<span>{{trans('common.found')}} @{{count}} {{trans('common.results')}}</span>
			<md-button ng-click="previous()" ng-if="page!=1" style="min-width:0px">
				<md-icon md-svg-src="{{url('icons/ic_navigate_before_white_24px.svg')}}"></md-icon>
			</md-button>
				<md-button disabled="true" ng-if="page==1" style="min-width:0px">
				<md-icon md-svg-src="{{url('icons/ic_navigate_before_white_24px.svg')}}"></md-icon>
			</md-button>
				<span>{{trans('common.page')}} @{{page}}</span>
				<md-button ng-click="next()" ng-if="!isMax()" style="min-width:0px">
				<md-icon md-svg-src="{{url('icons/ic_navigate_next_white_24px.svg')}}"></md-icon>
			</md-button>
				<md-button disabled="true" ng-if="isMax()" style="min-width:0px">
				<md-icon md-svg-src="{{url('icons/ic_navigate_next_white_24px.svg')}}"></md-icon>
			</md-button>
			<md-input-container flex="30">
				<label>{{trans('common.per_page')}}</label>
				<md-select ng-model="perPage" ng-change="setPageToOne()">
					<md-option ng-value="5">5</md-option>
					<md-option ng-value="10">10</md-option>
					<md-option ng-value="15">15</md-option>
					<md-option ng-value="20">20</md-option>
				</md-select>
			</md-input-container>
		</div>
	@if ($status == 'y')
		<md-button class="md-raised md-primary md-fab" ng-click="toggleDepInsertSidenav()" style="margin-right:16px">
			<md-tooltip md-direction="left">{{trans('common.add_new_department')}}</md-tooltip>
			<md-icon md-svg-src="{{url('icons/ic_add_white_24px.svg')}}"></md-icon>
		</md-button>
	@endif
	</div>
	
	<md-list>
		<div>
			<md-list-item style="padding:0px 16px; left:-16px">
				<p><md-subheader>{{trans('common.name')}}</md-subheader></p>
				<p><md-subheader>{{trans('common.address')}}</md-subheader></p>
				<p><md-subheader>{{trans('common.manager')}}</md-subheader></p>
				<md-button class="md-raised" style="min-width:0px; visibility:hidden"><md-icon md-svg-src="{{url('icons/ic_info_white_24px.svg')}}"></md-icon></md-button>
				<md-button class="md-raised" style="min-width:0px; visibility:hidden"><md-icon md-svg-src="{{url('icons/ic_info_white_24px.svg')}}"></md-icon></md-button>
			@if ($status == 'y')
				<md-button class="md-raised" style="min-width:0px; visibility:hidden"><md-icon md-svg-src="{{url('icons/ic_info_white_24px.svg')}}"></md-icon></md-button>
				<md-button class="md-raised" style="min-width:0px; visibility:hidden"><md-icon md-svg-src="{{url('icons/ic_info_white_24px.svg')}}"></md-icon></md-button>
			@endif
			</md-list-item>
		</div>
		<div ng-repeat="item in deps">
			<md-divider></md-divider>
			<md-list-item ng-click="dosomething()">
				<p>@{{item.dep_name}}</p>
				<p>@{{item.dep_address}}</p>
				<p>@{{item.mng_name}}</p>
				<md-button class="md-primary md-hue-2" ng-click="openDepSelectSidenav(item.dep_id)" style="min-width:0px">
					<md-tooltip md-direction="top">{{trans('common.info')}}</md-tooltip>
					<md-icon md-svg-src="{{url('icons/ic_info_white_24px.svg')}}"></md-icon>
				</md-button>
				<md-button class="md-primary md-hue-2" href="emp/@{{item.dep_id}}" style="min-width:0px;top:6px">
					<md-tooltip md-direction="top">{{trans('common.employee')}}</md-tooltip>
					<md-icon md-svg-src="{{url('icons/ic_people_white_24px.svg')}}"></md-icon>
				</md-button>
			@if ($status == 'y')	
				<md-button class="md-primary md-hue-2" ng-click="openDepUpdateSidenav(item.dep_id)" style="min-width:0px">
					<md-tooltip md-direction="top">{{trans('common.modify')}}</md-tooltip>
					<md-icon md-svg-src="{{url('icons/ic_edit_white_24px.svg')}}"></md-icon>
				</md-button>
				<md-button class="md-primary md-hue-2" ng-click="showDepDeleteDialog(item.dep_id)" style="min-width:0px">
					<md-tooltip md-direction="top">{{trans('common.delete')}}</md-tooltip>
					<md-icon md-svg-src="{{url('icons/ic_delete_white_24px.svg')}}"></md-icon>
				</md-button>
			@endif	
			</md-list-item>
		</div>
	</md-list>
@endsection

@include('sidenavs.dep-select')
@if ($status == 'y')
	@include('sidenavs.dep-insert')
	@include('sidenavs.dep-update')
@endif

@section('js')
	<script type="text/javascript" src="{{url('js/dep.js')}}"></script>
@endsection