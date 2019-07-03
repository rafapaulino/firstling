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
				cwd: '<%= config.bower_components %>/plyr/dist',
				src: 'plyr.svg',
				dest: '<%= config.js %>'
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
					   '<%= config.bower_components %>/jcarousel/dist/jquery.jcarousel.min.js',
					   '<%= config.bower_components %>/jquery-scroll-top/js/backToTop.min.js',
					   '<%= config.bower_components %>/jquery-touchswipe/jquery.touchSwipe.min.js',
					   '<%= config.bower_components %>/rafa-carrossel/js/carrossel.min.js',
					   '<%= config.bower_components %>/noticias-relacionadas/js/noticias-relacionadas.min.js',
					   '<%= config.bower_components %>/plyr/dist/plyr.min.js',
					   '<%= config.bower_components %>/smartmenus/src/jquery.smartmenus.js',
					   '<%= config.bower_components %>/smartmenus/dist/addons/bootstrap-4/jquery.smartmenus.bootstrap-4.min.js',
					   '<%= config.bower_components %>/venobox/venobox/venobox.min.js',
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
					   '<%= config.bower_components %>/jcarousel/examples/responsive/jcarousel.responsive.css',
					   '<%= config.bower_components %>/jquery-scroll-top/css/backToTop.css',
					   '<%= config.bower_components %>/barra-topo/css/barra-topo.min.css',
					   '<%= config.bower_components %>/redes-sociais-mini/css/redes-sociais-mini.min.css',
					   '<%= config.bower_components %>/categories/css/categories.min.css',
					   '<%= config.bower_components %>/tagcloud/css/tags.css',
					   '<%= config.bower_components %>/ultimas-noticias/css/ultimas-noticias.min.css',
					   '<%= config.bower_components %>/Pure-CSS3-Animated-Border/css/animated-border/animated-border.min.css',
					   '<%= config.bower_components %>/animate.css/animate.min.css',
					   '<%= config.bower_components %>/rafa-carrossel/css/carrossel.min.css',
					   '<%= config.bower_components %>/prev-next/css/prev-next.min.css',
					   '<%= config.bower_components %>/noticias-relacionadas/css/noticias-relacionadas.css',
					   '<%= config.bower_components %>/plyr/dist/plyr.css',
					   '<%= config.bower_components %>/smartmenus/src/addons/bootstrap-4/jquery.smartmenus.bootstrap-4.css',
					   '<%= config.bower_components %>/venobox/venobox/venobox.css',
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
