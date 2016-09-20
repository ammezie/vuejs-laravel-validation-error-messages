<!DOCTYPE html>
<html>
    <head>
	<!-- add csrf token -->
	<meta id="token" name="token" value="{{ csrf_token() }}">
	
	<title>Handling Laravel Validation Error Messages With Vue.js</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            body {
                padding: 50px;
            }    
        </style>
    </head>
    <body>
        <div class="container">
	        <!-- this will be displayed upon successful submission of form -->
	        <div class="alert alert-success" v-if="submitted">
                Post created!
            </div>
			
	        <!-- prevent the page from refreshing after submission -->
            <form @submit.prevent="createPost" method="POST">
                <legend>Create Post</legend>                
                
	            <!-- add Bootstrap .has-error if title field has errors -->
                <div class="form-group@{{ errors.title ? ' has-error' : '' }}">
                    <label>Post Title</label>
                    <input type="text" name="title" class="form-control" v-model="post.title" value="{{ old('title') }}">

		            <!-- display errors if field has errors using FormError component -->
                    <form-error v-if="errors.title" :errors="errors">
                        @{{ errors.title }}
                    </form-error>
                </div>
		
		        <!-- add Bootstrap .has-error if body field has errors -->
                <div class="form-group@{{ errors.body ? ' has-error' : '' }}">
                    <label>Post Body</label>
                    <textarea name="body" class="form-control" rows="5" v-model="post.body">{{ old('body') }}</textarea>

		             <!-- display errors if field has errors using FormError component -->
                     <form-error v-if="errors.body" :errors="errors">
                        @{{ errors.body }}
                    </form-error>
                </div>
            
                <button type="submit" class="btn btn-primary">Create Post</button>
            </form>
        </div>
	<script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>