module.exports = (grunt) ->

  grunt.initConfig
    pkg: grunt.file.readJSON 'package.json'

    less:
      all:
        options:
          yuicompress: true
          compress: true
        files:
          'dist/style.css': 'less/style.less'

    concat:
      options:
        separator: ';'
      all:
        src:
          [ "js/bootstrap.min.js"
            "js/index.js"
          ]
        dest:
          "dist/all.js"

    uglify:
      all:
        files:
          "dist/all.min.js": "dist/all.js"

    copy:
      res:
        files: [{expand: true, src: ['img/**/*'], dest: 'dist/', filter: 'isFile'},
                {expand: true, src: ['font/**/*'], dest: 'dist/', filter: 'isFile'}]
      php:
        files: [{expand: true, cwd:'php/', src: ['**/*.php'], dest: 'dist/', ext: '.php', filter: 'isFile'}]

    clean:
      js: ["dist/all.js"]
      res: ["dist/font", "dist/img"]
      php: ["dist/*.php"]

    php:
      all:
        options:
          base: 'dist'
          hostname: '127.0.0.1'
          port: 9001

    watch:
      less:
        files: ['less/*.less', 'less/bootstrap/*.less']
        tasks: ['less:all']
      concat:
        files: ['js/*.js']
        tasks: ['concat:all', 'uglify:all', 'clean:js']
      copyres:
        files: ['font/**/*', 'img/**/*']
        tasks: ['clean:res', 'copy:res']
      copyphp:
        files: ['php/**/*.php']
        tasks: ['clean:php', 'copy:php']

  grunt.loadNpmTasks 'grunt-contrib-clean'
  grunt.loadNpmTasks 'grunt-contrib-less'
  grunt.loadNpmTasks 'grunt-contrib-concat'
  grunt.loadNpmTasks 'grunt-contrib-uglify'
  grunt.loadNpmTasks 'grunt-contrib-copy'
  grunt.loadNpmTasks 'grunt-php'
  grunt.loadNpmTasks 'grunt-contrib-watch'

  grunt.registerTask 'default', ['clean', 'less', 'concat', 'uglify', 'clean:js', 'copy', 'php', 'watch']
