/*
 * angularjs
 * https://github.com/markate/grunt
 *
 * Copyright (c) 2014 "markate" suhongtang, contributors
 * Licensed under the MIT license.
 */

'use strict';


// Basic template description.
exports.description = 'Create a jangularjs Scaffolding';

// Template-specific notes to be displayed before question prompts.
exports.notes = 'angularjs Scaffolding';

// Template-specific notes to be displayed after question prompts.
exports.after = 'thank you for your messages';

// Any existing file or directory matching this wildcard will cause a warning.
exports.warnOn = '*';
// The actual init template.
exports.template = function(grunt, init, done) {
  var angularJson = grunt.file.readJSON('angular.json');
  init.process({type: 'angular'}, [

  ], function(err, props) {
    props.keywords = [];
    for (var o in angularJson){
        props[o] = angularJson[o];
    }
    // Files to copy (and process).
    var files = init.filesToCopy(props);
    // Actually copy (and process) files.
    init.copyAndProcess(files, props, {noProcess: 'Gruntfile.js,package.json,angular.json'});
    // Generate package.json file, used by npm and grunt.
    init.writePackageJSON('package.json', {
      name: 'angular Scaffolding',
      version: '0.0.0-ignored',
      npm_test: 'Scaffolding',
      // TODO: pull from grunt's package.json
      node_version: '>= 0.8.0',
      devDependencies: {
        'grunt-contrib-jshint': '~0.6.0',
        'grunt-contrib-qunit': '~0.2.0',
        'grunt-contrib-concat': '~0.3.0',
        'grunt-contrib-uglify': '~0.2.0',
        'grunt-contrib-watch': '~0.4.0',
        'grunt-contrib-clean': '~0.4.0'
      }
    });

    // All done!
    done();
  });

};
