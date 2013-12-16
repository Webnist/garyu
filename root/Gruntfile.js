module.exports = function( grunt ) {

    // Project configuration
    grunt.initConfig( {
        pkg:    grunt.file.readJSON( 'package.json' ),
        concat: {
            options: {
                stripBanners: true,
                banner: '/*! <%= pkg.title %> - v<%= pkg.version %> - <%= grunt.template.today("yyyy-mm-dd") %>\n' +
                    ' * <%= pkg.homepage %>\n' +
                    ' * Copyright (c) <%= grunt.template.today("yyyy") %>;' +
                    ' * Licensed GPLv2+' +
                    ' */\n'
            },
            {%= js_safe_name %}: {
                src: [
                    'js/{%= file_name %}.js'
                ],
                dest: 'js/{%= file_name %}.min.js'
            }
        },
        jshint: {
            all: [
                'Gruntfile.js',
                'js/{%= file_name %}.js'
            ],
            options: {
                curly:   true,
                eqeqeq:  true,
                immed:   true,
                latedef: true,
                newcap:  true,
                noarg:   true,
                sub:     true,
                undef:   true,
                boss:    true,
                eqnull:  true,
                globals: {
                    exports: true,
                    module:  false,
                    jQuery: false,
                    Console: false
                }
            }
        },
        uglify: {
            all: {
                files: {
                    'js/{%= file_name %}.min.js': [
                        'js/{%= file_name %}.js'
                    ]
                },
                options: {
                    banner: '/*! <%= pkg.title %> - v<%= pkg.version %> - <%= grunt.template.today("yyyy-mm-dd") %>\n' +
                        ' * <%= pkg.homepage %>\n' +
                        ' * Copyright (c) <%= grunt.template.today("yyyy") %>;' +
                        ' * Licensed GPLv2+' +
                        ' */\n',
                    mangle: {
                        except: ['jQuery']
                    }
                }
            }
        },

        compass: {
            dist: {
                options: {
                    config: '_compass_config/config.rb'
               }
            }
        },

        // CSSの並び替え
        csscomb: {
            dist: {
                files: {
                    'css/{%= file_name %}.css': ['css/{%= file_name %}.css']
                }
            }
        },
        copy: {
            main: {
                files: [
                    {
                        expand: true,
                        src: ['css/{entry-contents,widget}.css'],
                        dest: 'styleguide/'}
                ]
            }
        },
        // CSSの圧縮
        cssmin: {
            options: {
                report: 'gzip'
            },
            compress: {
                files: {
                    'css/{%= file_name %}.min.css': ['css/{%= file_name %}.css']
                }
            }
        },
        // styleguide
        styleguide: {

            styledocco: {
                options: {
                    framework: {
                        name: 'styledocco'
                    },
                    name: '{%= title %}',
                    template: {
                       include: ['plugin.css', 'app.js']
                    }
                },
                files: {
                    'styleguide': 'styleguide/css/*.css'
                }
            }
        },
        // 監視
        watch: {
            options: {
                livereload: true,
                nospawn: true
            },
            js: {
                files: ['js/*.js'],
                tasks: ['concat', 'jshint', 'uglify']
            },
            compass: {
                files: ['_sass/*.scss'],
                tasks: ['compass', 'csscomb', 'cssmin']
            },
            cssmin: {
                files: ['css/{%= file_name %}.css'],
                tasks: ['csscomb', 'cssmin']
            }
        },
        // 画像圧縮
        imageoptim: {
            dist: {
                src: ['images']
            }
        },
        exec: {
            gettext: {
                command: 'php ~/wordpress-i18n-tools/makepot.php wp-theme . languages/{%= prefix %}.pot'
            },
            zip: {
                command: 'mkdir ../backup\n cp -r ./ ../backup\n mv ../backup/ ./\n rm -rf backup/.sass-cache backup/_compass_config backup/_sass backup/node_modules backup/.gitignore backup/package.json backup/Gruntfile.js backup/.DS_Store backup/.git\n mv backup {%= file_name %}\n zip {%= file_name %}.zip {%= file_name %}/*\n rm -rf {%= file_name %}'
            }
        }
    } );
    //
    // Load other tasks
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-csscomb');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-styleguide');
    grunt.loadNpmTasks('grunt-imageoptim');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-exec');

    // Default task.
    grunt.registerTask(
        'default',
        ['jshint', 'concat', 'uglify', 'compass', 'csscomb', 'cssmin']
    );
    grunt.registerTask(
        'image',
        ['imageoptim']
    );
    grunt.registerTask(
        'guide',
        ['copy', 'styleguide']
    );
    grunt.registerTask(
        'i18n',
        ['exec:gettext']
    );
    grunt.registerTask(
        'zip',
        ['exec:zip']
    );

    grunt.util.linefeed = '\n';
};
