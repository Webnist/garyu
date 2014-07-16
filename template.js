/**
 * grunt-wp-underscores
 * https://github.com/ericmann/grunt-wp-underscores
 *
 * Copyright (c) 2013 Eric Mann, 10up
 * Licensed under the MIT License
 */

'use strict';

exports.description = 'Create a WordPress theme Megumi starter theme.';

// Template-specific notes to be displayed before question prompts.
exports.notes = '';

// Template-specific notes to be displayed after the question prompts.
exports.after = '';

// Any existing file or directory matching this wildcard will cause a warning.
exports.warnOn = '*';

var exec = require('child_process').exec;

// The actual init template
exports.template = function( grunt, init, done ) {
    init.process( {}, [
        // Prompt for these values.
        init.prompt( 'title', 'Megumi Base Themes' ),
        {
            name   : 'prefix',
            message: 'PHP function prefix',
            default: 'megumi'
        },
        init.prompt( 'description', 'Megumi base theme' ),
        init.prompt( 'homepage', 'https://www.digitalcube.jp/' ),
        init.prompt( 'author_name', 'DigitalCube Co., Ltd' ),
        init.prompt( 'author_url', 'https://www.digitalcube.jp/' ),
    ], function( err, props ) {
        props.keywords = [];
        props.version = '0.1.0';
        props.devDependencies = {
            'grunt': '~0.4.5',
            'grunt-contrib-watch': '~0.6.1',
            'grunt-contrib-concat': '~0.4.0',
            'grunt-contrib-uglify': '~0.5.0',
            'grunt-contrib-jshint': '~0.10.0',
            'grunt-contrib-nodeunit': '~0.4.1',
            'grunt-contrib-cssmin': '~0.10.0',
            'grunt-contrib-compass': '~0.9.0',
            'grunt-csscomb': '~0.5.0',
            "grunt-contrib-copy": "~0.5.0",
            "grunt-styleguide": "~0.2.15",
            'grunt-imageoptim': '~1.4.1',
            "grunt-exec": "~0.4.6"
        };
        // Sanitize names where we need to for PHP/JS
        props.name = props.title.replace( /\s+/g, '-' ).toLowerCase();
        // Development prefix (i.e. to prefix PHP function names, variables)
        props.prefix = props.prefix.replace('/[^a-z_]/i', '').toLowerCase();
        // Development prefix in all caps (e.g. for constants)
        props.prefix_caps = props.prefix.toUpperCase();
        // An additional value, safe to use as a JavaScript identifier.
        props.js_safe_name = props.name.replace(/[\W_]+/g, '_').replace(/^(\d)/, '_$1');
        props.file_name = props.js_safe_name.replace(/_/g, '-');
        // An additional value that won't conflict with NodeUnit unit tests.
        props.js_test_safe_name = props.js_safe_name === 'test' ? 'myTest' : props.js_safe_name;
        props.js_safe_name_caps = props.js_safe_name.toUpperCase();

        // Files to copy and process
        var files = init.filesToCopy( props );
        console.log( files );
        // Actually copy and process files
        init.copyAndProcess( files, props );
        // Generate package.json file
        init.writePackageJSON( 'package.json', props );

        var path = require('path');
        var fs = require('fs');

        fs.stat(path.resolve('css'), function(err, stats){
            if (err) {
                fs.mkdir(path.resolve('css'));
            }
        });

        fs.stat(path.resolve('images'), function(err, stats){
            if (err) {
                fs.mkdir(path.resolve('images'));
            }
        });

        fs.writeFileSync(
            path.resolve('_sass')+'/'+props.file_name+'.scss',
            '@import "variable";\n@import "compass";\n@import "mixins";\n//import normalize\n@import url("normalize.min.css");\n/* Bass */\n\n/* link color\n++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */\n\n/* Layout\n++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */\n\n/* Header\n++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */\n\n/* Common\n++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */\n\n/* HOME\n++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */\n\n/* Archive\n++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */\n\n/* Single\n++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */\n\n/* Page\n++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */\n\n/* Footer\n++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */\n\n/* Other\n++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */\n\n//Write style start\n\n//Write style end\n//import entry-contents style (styledocco)\n@import "entry-contents";\n//import widget style (styledocco)\n@import "widget";\n//What WordPress?\n@import "wordpress";\n@import "extend";'
        );

       fs.writeFileSync(
            path.resolve('js')+'/'+props.file_name+'.js',
            '(function($){})(jQuery);'
        );

        var child = exec('npm install', function(err, stdout, stderr) {
          if (!err) {
            console.log('stdout: ' + stdout);
            console.log('stderr: ' + stderr)
            exec('grunt');
            done();
          } else {
            console.log(err);
            // err.code will be the exit code of the child process
            console.log(err.code);
            // err.signal will be set to the signal that terminated the process
            console.log(err.signal);
            done();
          }
        })
    });
};
