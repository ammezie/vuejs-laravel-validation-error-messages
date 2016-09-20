import Vue from 'vue';
import VueResource from 'vue-resource';

// tell Vue to use the vue-resource plugin
Vue.use(VueResource);

// import FormError component
import FormError from './components/FormError.vue';

// get csrf token
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');

// instantiate a new Vue instance
new Vue({
    // mount Vue to .container
    el: '.container',

   // define components
    components: {
    	FormError,
    },

    data: {
    	post: {
    		title: '',
    		body: '',
    	},

    	submitted: false,

	    // array to hold form errors
    	errors: [],
    },
	
    methods: {
    	createPost() {
			let post = this.post;
			
			this.$http.post('create-post', post).then(function(response) {
				// form submission successful, reset post data and set submitted to true
				this.post = {
					title: '',
					body: '',
				};
				
				this.submitted = true;
			}, function (response) {
			    // form submission failed, pass form  errors to errors array
				this.$set('errors', response.data);
			});
		}
    }
});