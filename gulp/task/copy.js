const gulp = require('gulp');
const path = require('path');

const getGlobs = require('MaxBucknell_Gulp/lib/get-globs');

const fileTypes = [
    'css',
    'csv',
    'eot',
    'gif',
    'htc',
    'ico',
    'jbf',
    'jpg',
    'json',
    'less',
    'map',
    'md',
    'png',
    'sass',
    'scss',
    'svg',
    'swf',
    'ttf',
    'txt',
    'woff',
    'woff2'
];

function main (config) {
    return gulp.src(getGlobs(fileTypes), { cwd: path.join(config.build_dir, 'flatten') })
        .pipe(gulp.dest(config.output_dir));
}

module.exports = main;