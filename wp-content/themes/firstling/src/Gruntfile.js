/*global module:false*/
module.exports = function(grunt) {
	'use strict';

 // Project configuration.
 grunt.initConfig({
   // Metadata.
   pkg: grunt.file.readJSON('package.json'),
   bower: grunt.file.readJSON('.bowerrc'),

	   config: {
			css: '../assets/css',
			js: '../assets/js',
			sass: '../assets/sass',
			devjs: '../assets/devjs/',
			images: '../assets/images',
			webfonts: '../assets',
			bower_components: '../bower_components'
	   },
	   copy: {
		   target: {
			   files: [{
				 expand: true,
				 cwd: '<%= config.bower_components %>/font-awesome',
				 src: 'webfonts/**/*',
				 dest: '<%= config.webfonts %>'
			   },
			   {
				 expand: true,
				 cwd: '<%= config.bower_components %>/jquery-validation/src',
				 src: 'localization/*',
				 dest: '<%= config.js %>/jquery-validation/src'
			   }]
		   }
	   },
	   uglify: {
		   target: {
			   files: {
				   '<%= config.js %>/library.min.js': [
					   '<%= config.bower_components %>/jquery/dist/jquery.min.js',
					   '<%= config.bower_components %>/bootstrap/dist/js/bootstrap.bundle.min.js',
					   '<%= config.bower_components %>/jquery-validation/dist/jquery.validate.min.js',
					   '<%= config.bower_components %>/jquery-validation/dist/additional-methods.min.js',
					   '<%= config.bower_components %>/jquery-scroll-top/js/backToTop.min.js'
				   ],
				   '<%= config.js %>/app.min.js': [
					   '<%= config.devjs %>/app.js',
				   ]
			   }
		   }
	   },
	   sass: {
		   dist: {
			   options: {
				   compass: false,
				   style: 'compressed'
			   },
			   files: {                        
				   '<%= config.css %>/app.css': '<%= config.sass %>/app.scss'
			   }
		   }
	   },
	   cssmin: {
		   target: {
			   files: {
				   '<%= config.css %>/library.min.css': [
					   '<%= config.bower_components %>/font-awesome/css/all.min.css',
					   '<%= config.bower_components %>/bootstrap/dist/css/bootstrap.min.css',
					   '<%= config.bower_components %>/jquery-scroll-top/css/backToTop.css'
				   ],
				   '<%= config.css %>/app.min.css': [
					   '<%= config.css %>/app.css'
				   ]
			   }
		   }
	   }
 });

 // These plugins provide necessary tasks.
   grunt.loadNpmTasks('grunt-contrib-copy');
   grunt.loadNpmTasks('grunt-contrib-uglify');
   grunt.loadNpmTasks('grunt-contrib-sass');
   grunt.loadNpmTasks('grunt-contrib-cssmin');

 // Default task.
   grunt.registerTask('default', ['copy', 'uglify', 'sass', 'cssmin']);

};
