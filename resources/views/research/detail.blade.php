@extends('layouts.general')

@section('content')
<div class="container">
	<div class="row" id="post-title">
		<div class="col s12">
				<h3>Research Title: {{ $research->title }}</h3>
				<p>Posted by <a href="{{ url('profile/profileid') }}/{{ $research->user[0]->id }}">{{ $research->user[0]->first_name.' '.$research->user[0]->last_name }}</a> on <span id="post-date">{{ $research->created_at }}</span></p>      				
			</div>
	</div>

	<div class="row" id="post-progress">
		<p>Funding progress: PHP <span id="post-progressamount">10,000.00</span> received</p>
		<div id="post-progressbar" style="position: relative; width: 100%; height: 30px; background-color: #bdbdbd">
		  <div id="post-progressstatus" style="position: absolute; width: 10%; height: 100%; background-color: #00c853;">
		  	<div id="post-progresslabel" style="text-align: center; line-height: 30px; color: white;">10%</div>
		  </div>
		</div>		
	</div>
	
	<div class="row" id="post-content">

			<div class="col s12">		

  			<ul class="collapsible" data-collapsible="accordion">
		    
		    <li>
		      <div class="collapsible-header active"><i class="material-icons">filter_drama</i>Abstract</div>
		      <div class="collapsible-body">
		      <p>
		      	{{ $research->research_abstract }}
		      </p>
		      </div>
		    </li>
		    
		    <li>
		      <div class="collapsible-header"><i class="material-icons">whatshot</i>Comments</div>
		      <div class="collapsible-body">
		      
		      
			      <div class="row">

			      </div>
		      </div>
		    </li>

		  	</ul>		
	        	
				
			</div>    
			
  			
	</div>

	<!-- TAGS -->
	<div class="row" id="post-tags">
		<div class="col s12">
				Tagged under: 
					@foreach($research->Tag as $tag)
					<a href="#"><span class="chip">{{$tag->tag_name}}</span></a>
					@endforeach
			</div>
	</div>

	<!-- CREATOR, ADMIN OPTIONS -->
		<!-- desktop -->
		<div class="row right-align hide-on-med-and-down" id="post-options">
			<div class="col s12">
				@if($research->document_file_name !== "")
				<a href="{{ url('research/download') }}?file_name={{ $research->document_file_name }}" target="_blank" class="yellow darken-3 waves-effect waves-light btn"><i class="material-icons left">mode_edit</i>Download Manuscript</a>
				@endif
				<a href="{{ url('research/edit') }}/{{ $research->id }}" class="yellow darken-3 waves-effect waves-light btn"><i class="material-icons left">mode_edit</i>Edit</a>
				<a href="#post-delete" class="red waves-effect waves-light btn"><i class="material-icons left">delete</i>Delete</a>
			</div>
		</div>
		<!-- mobile -->
		<div class="row right-align hide-on-large-only" id="post-options">
			<div class="fixed-action-btn horizontal click-to-toggle">
			    <a class="btn-floating btn-large red">
			      <i class="material-icons">menu</i>
			    </a>
			    <ul>
			    @if($research->document_file_name !== "")
			    <li><a href="{{ url('research/download') }}?file_name={{ $research->document_file_name }}" class="btn-floating yellow darken-3" target="_blank"><i class="material-icons">mode_edit</i></a></li>
			    @endif
			      <li><a href="{{ url('research/edit') }}/{{ $research->id }}" class="btn-floating yellow darken-3"><i class="material-icons">mode_edit</i></a></li>			      
			      <li><a href="#post-delete" class="btn-floating red"><i class="material-icons">delete</i></a></li>
			    </ul>
			  </div>

</div>

<!-- MODALS -->	
<!-- delete post -->
<div id="post-delete" class="modal">
	<div class="modal-content">
		<h4>Delete post</h4>
		<p>Are you sure you want to delete this post? This cannot be undone.</p>				 
	</div>
	<div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-light btn-flat">Yes, Delete</a>
        <a href="#!" class="blue modal-action modal-close waves-effect waves-lgiht btn-flat" style="color: #fff;">No, go back</a>
     </div>
</div>
<!-- request post -->
<!-- <div id="post-request" class="modal">
	<div class="modal-content">
		<h4>Request claim</h4>
		<p>A request for a claim to this post will be sent to <a href="#">user0805</a>.</p>			
		<div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-light btn-flat">Cancel</a>
            <a href="#!" class="blue modal-action modal-close waves-effect waves-lgiht btn-flat" style="color: #fff;">Request Claim</a>
        </div>
	</div>
</div> -->

<!-- report post -->
<!-- <div id="post-report" class="modal">
	<div class="modal-content">
		<h4>Report post</h4>				
		 <div class="row">
		    <form class="col s12">
		       <div class="row">
		        <div class="input-field col s12">
		          <textarea id="post-report-text" class="materialize-textarea"></textarea>
		          <label for="post-report-text">Comments</label>
		        </div>
		      </div>
		      <div class="row">
		        <div class="input-field col s12">
		          	<a href="#!" class="red modal-action modal-close waves-effect waves-light btn-flat" style="color: #fff;">Report Post</a>
        			<a href="#!" class="modal-action modal-close waves-effect waves-lgiht btn-flat" >Cancel</a>
		        </div>
		      </div>				     
		    </form>
		  </div>
	</div>
</div> -->
@endsection