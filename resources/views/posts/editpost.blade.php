<?php
/**
 * Author: Tom Abao
 *   Github: https://github.com/kormin
 *   Email: abaotom14@gmail.com
 * Description: 
 * Created On: December 16, 2016
 * Additional Comments: 
 */
?>
@extends('layouts.general')

@section('title', 'Edit Post')

@section('content')
<div class="container">
	<div class='row'>
		<div class='col s12'>
			<div class='card'>
				<div class='card-content'>

					<span class='card-title'>Update Post</span>
					<form class="form-horizontal" method="post" action="{{ url('/posts/edit/'.$id.'/'.$user_id) }}">
						{{ csrf_field() }}
						<div class="row form-group{{ $errors->has('title') ? ' has-error' : '' }}">
							<label for="title" class="control-label col-sm-4">Edit title: </label>
							<div class="col-sm-8">
								<input type="text" id="title" class="form-control" name="title" placeholder="{{$title}}">
								@if ($errors->has('title'))
									<span class="help-block">
										<strong>{{ $errors->first('title') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="row form-group{{ $errors->has('content') ? ' has-error' : '' }}">
							<label for="content" class="control-label col-sm-4">Edit content: </label>
							<div class="col-sm-8">
								<input type="text" id="content" class="form-control" name="content" placeholder="{{$content}}">
								@if ($errors->has('content'))
									<span class="help-block">
										<strong>{{ $errors->first('content') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-offset-4 col-sm-8">
								<button type="submit" id="submit" class="btn btn-default" >Submit</button>
							</div>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection