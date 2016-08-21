import Vue from 'vue';
import VueResource from 'vue-resource';

Vue.use(VueResource);

import FormError from './components/FormError.vue';
import Notification from './components/Notification.vue';

Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');

new Vue({
    el: '.container',

    components: {
    	FormError,
    	Notification,
    },

    data: {
    	posts: [],

    	post: {
    		title: '',
    		body: '',
    	},

    	submitted: false,

    	errors: [],
    },

    ready: function() {
    	this.getPosts();
    },

    methods: {
    	getPosts() {
			this.$http.get('/').then(function(response) {
				this.$set('posts', response.data);
			});
		},

    	createPost() {
			let post = this.post;

			this.$set('post', post);

			this.$http.post('create-post', post).then(function(response) {
				// post created successfully
				this.post = {
					title: '',
					body: '',
				};
				
				this.submitted = true;
			}, function (response) {
				// post not created
				this.$set('errors', response.data);
			});
		}
    }
});