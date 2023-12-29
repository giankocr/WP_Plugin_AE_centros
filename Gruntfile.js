const { assert } = require('console');
var path = require('path');

module.exports = function(grunt) {

    grunt.initConfig({

        pkg: grunt.file.readJSON('package.json'),


        uglify: {
            options: {
                beautify: true,
                banner: '/**\n' +
                        '* Package: <%= pkg.name %> - v<%= pkg.version %> \n' +
                        '* Description: <%= pkg.description %> \n' +
        				'* Last build: <%= grunt.template.today("yyyy-mm-dd") %> \n' +
						'* @author <%= pkg.author %> \n' +
						'* @license <%= pkg.license %> \n'+
                        '*/\n'
            },
            target: {
                files: {
                    'assets/build/js/scripts.js': ['assets/src/js/*.js']
                }
            }
        },

        concat: {
            css: {
                src: ['assets/src/scss/main/gridpack.scss','assets/src/scss/main/mapa.scss','assets/src/scss/main/user-style.scss','assets/src/scss/main/admin-style.scss','assets/src/scss/partials/media-queries.scss'],
                dest: 'assets/src/scss/build.scss'
            }
        },

        sass: {
            dist: {
                options: {                       // Target options
                    style: 'expanded'
                },
                files: [{
                    'assets/build/css/style.css': ['assets/src/scss/build.scss','assets/src/scss/partials/media-queries.scss']
                }]
            }
        },

        watch: {
            scripts: {
                files: ['assets/src/js/**/*.js'],
                tasks: [ 'uglify'],
                options: { spawn: false }
            },
            styles: {
                files: ['assets/src/scss/**/*.scss'],
                tasks: ['concat','sass'],
                options: { spawn: false }
            }
        },

        // addtextdomain: {
        //     options: {
        //         i18nToolsPath: 'tools/i18n/',
        //         textdomain: '<%= pkg.name %>',
        //         updateDomains: ['wordpress-plugin-starter']
        //     },
        //     target: {
        //         files: {
        //             src: [ 'include/**/*.php' ]
        //         }
        //     }
        // },
        
        copy: {
            main: {
              files: [
                // includes CSS files within path
                {expand: true, flatten: true, src: ['assets/build/css/*'], dest: 'AE_Centros/assets/build/css', filter: 'isFile'},
                // includes JS files within path
                {expand: true, flatten: true, src: ['assets/build/js/*'], dest: 'AE_Centros/assets/build/js', filter: 'isFile'},
                 // includes images within path
                {expand: true, flatten: true, src: ['images/*'], dest: 'AE_Centros/images/'},
                // includes PHP files within path
                {expand: true, flatten: true, src: ['include/*'], dest: 'AE_Centros/include/', filter: 'isFile'},
                   // includes PHP files within path
                   {expand: true, flatten: true, src: ['include/templates/*'], dest: 'AE_Centros/include/templates', filter: 'isFile'},
                 // includes PO files within path
                {expand: true, flatten: true, src: ['languages/*'], dest: 'AE_Centros/languages', filter: 'isFile'},
                 // includes PHP files within path
                { src: ['ae-centros.php'], dest: 'AE_Centros/'}
              ],
            },
          },

        makepot: {
            target: {
                options: {
                    type: 'wp-plugin',
                    mainFile: '<%= pkg.name %>.php',
                    domainPath: '/languages'
                }
            }
        },
        // make a zipfile
        compress: {
            main: {
            options: {
                archive: 'AE_Centros.zip'
            },
            files: [
                {src: ['AE_Centros/*'], dest: '/', filter: 'isFile'}, // includes files in path
                {src: ['AE_Centros/**'], dest: '/'}, // includes files in path and its subdirs
                // {expand: true, cwd: 'AE_Centros/', src: ['**'], dest: 'AE_Centros/'}, // makes all src relative to cwd
                // {flatten: true, src: ['AE_Centros/**'], dest: 'AE_Centros/', filter: 'isFile'} // flattens results to a single level
            ]
            }
        }
    });

    // development tasks
    
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-compress');
    grunt.loadNpmTasks('grunt-wp-i18n');

    // register watch task
    grunt.registerTask('default', [ 'watch', 'makepot' ] );
    // register build task
    grunt.registerTask('build', [ 'uglify', 'concat', 'sass', 'copy', 'compress' ] );
    // register copy task
    // grunt.registerTask('copy', [ 'copy' ] );
};
