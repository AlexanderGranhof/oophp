const gulp = require("gulp");
const less = require("gulp-less");
const cssmin = require("gulp-uglifycss");
const rename = require("gulp-rename");

gulp.task("less", () => {
    return gulp
        .src("src/less/*.less")
        .pipe(less())
        .pipe(cssmin())
        .pipe(rename({ suffix: ".min" }))
        .pipe(gulp.dest("htdocs/css"));
});

gulp.task("watch:less", () => {
    gulp.watch("src/less/*.less", gulp.series("less"));
});
