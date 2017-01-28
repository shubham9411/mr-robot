module.exports = function (grunt) {
    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        uglify: {
            options: {
                banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
            },
            build: {
                src: 'src/js/*.js',
                dest: 'main.js'
            }
        },
        sass: {
            dist: {
                options: {
                    style: 'compact'
                },
                files: {
                    'style.css': 'src/scss/style.scss',
                }
            }
        },
        watch: {
            scripts: {
                files: [
          'src/js/*.js',
          'src/scss/*.scss',
        ],
                tasks: ['default'],
                options: {
                    spawn: false,
                }
            }
        },
    cssmin: {
      target: {
        files: [{
          expand: true,
          cwd: '',
          src: ['style.css'],
          dest: '',
          ext: '.css'
        }]
      }
    },
    usebanner: {
      taskName: {
        options: {
          position: 'top',
          banner: '/*\nTheme Name: Resolution\n Theme URI: http://shubhampandey.in\n Author: Shubham Pandey\n Description: Theme developed by Shubham Pandey\n Version: 1.0.0\nText Domain: Resolution\nLicense URI: http://www.gnu.org/licenses/gpl-2.0.html\nLicense: GNU General Public License v2 or later\n*/',
          linebreak: true
        },
        files: {
          src: [ 'style.css']
        }
      }
    }
    }   );
    // Load the plugin that provides the "uglify" task.
    grunt.loadNpmTasks('grunt-contrib');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-banner');
    grunt.registerTask('default', ['sass', 'uglify', 'cssmin','usebanner']);
};