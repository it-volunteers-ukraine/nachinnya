const { src, dest, watch, parallel, series } = require("gulp");
const scss = require("gulp-sass")(require("sass"));
const concat = require("gulp-concat");
const uglify = require("gulp-uglify-es").default;
const autoprefixer = require("gulp-autoprefixer");
const imagemin = require("gulp-imagemin");
const newer = require("gulp-newer");
const path = require("path");
const postcss = require("gulp-postcss");
const postcssModules = require("postcss-modules");
const fs = require("fs");
const cssModulesJSON = {};
const rename = require("gulp-rename");

function images() {
  return src("src/images/*.*")
    .pipe(newer("assets/images"))
    .pipe(imagemin())
    .pipe(dest("assets/images"));
}

function styles() {
  return src("src/styles/main.scss")
    .pipe(autoprefixer({ overrideBrowserslist: ["last 10 versions"] }))
    .pipe(scss({ outputStyle: "compressed" }))
    .pipe(dest("assets/styles"));
}

function stylesTemplates() {
  return src("src/styles/template-styles/*.scss")
    .pipe(autoprefixer({ overrideBrowserslist: ["last 10 versions"] }))
    .pipe(scss({ outputStyle: "compressed" }))
    .pipe(dest("assets/styles/template-styles"));
}

function stylesTemplatesParts() {
  return src("src/styles/template-parts-styles/*.scss")
    .pipe(autoprefixer({ overrideBrowserslist: ["last 10 versions"] }))
    .pipe(scss({ outputStyle: "compressed" }).on("error", scss.logError))
    .pipe(dest("assets/styles/template-parts-styles"))
    .on("end", () => console.log("✅ stylesTemplatesParts завершено!"));
}

function blockStyles() {
  return src("inc/acf/blocks/**/*.module.scss")
    .pipe(
      postcss([
        postcssModules({
          generateScopedName: "[name]__[local]___[hash:base64:5]",
          getJSON: (cssFileName, json) => {
            const fileName = path.basename(cssFileName, ".module.scss");
            cssModulesJSON[fileName] = json;

            fs.mkdirSync("assets/blocks/styles/", { recursive: true });
            fs.writeFileSync(
              "assets/blocks/styles/modules.json",
              JSON.stringify(cssModulesJSON, null, 2)
            );
            // fs.writeFileSync("assets/blocks/modules.json", JSON.stringify(cssModulesJSON, null, 2));
          },
        }),
      ])
    )
    .on("error", (err) => {
      console.error("❌ Ошибка в PostCSS:", err);
      done(err); // Прерываем сборку, если произошла ошибка
    })
    .pipe(autoprefixer({ overrideBrowserslist: ["last 10 versions"] }))
    .on("error", (err) => {
      console.error("❌ Ошибка в Autoprefixer:", err);
      done(err);
    })
    .pipe(scss({ outputStyle: "compressed" }))
    .on("error", (err) => {
      console.error("❌ Ошибка при компиляции SCSS:", err);
      done(err);
    })
    .pipe(
      rename(function (path) {
        path.basename = path.basename.replace(".module", "");
      })
    )
    .pipe(dest("assets/blocks/styles"))
    .on("error", (err) => {
      console.error("❌ Ошибка при сохранении файла:", err);
      done(err);
    })
    .on("end", () => {
      console.log("✅ blockStyles завершена успешно!");
      // resolve(); 
    });
  // .on("end", done);
}

// ****************************************

function scripts() {
  return src("src/scripts/*.js")
    .pipe(concat("main.js"))
    .pipe(uglify())
    .pipe(dest("assets/scripts"));
}

function scriptsTemplates() {
  return src("src/scripts/template-scripts/*.js")
    .pipe(uglify())
    .pipe(dest("assets/scripts/template-scripts"));
}

function scriptsTemplateParts() {
  return src(["src/scripts/template-parts-scripts/*.js"])
    .pipe(uglify())
    .pipe(dest("assets/scripts/template-parts-scripts"));
}

function blockScripts() {
  return src("inc/acf/blocks/**/*.js")
    .pipe(uglify())
    .pipe(dest("assets/blocks/scripts"));
}

function watching() {
  watch("src/styles/*.scss", styles);
  watch("src/styles/template-styles/*.scss", stylesTemplates);
  watch("src/styles/template-parts-styles/*.scss", stylesTemplatesParts);
  watch("inc/acf/blocks/**/*.module.scss", blockStyles);
  watch("src/scripts/*.js", scripts);
  watch("src/scripts/template-scripts/*.js", scriptsTemplates);
  watch("src/scripts/template-parts-scripts/*.js", scriptsTemplateParts);
  watch("inc/acf/blocks/**/*.js", blockScripts);
  watch("src/images/**/*.*", images);
}

exports.styles = styles;
exports.stylesTemplates = stylesTemplates;
exports.stylesTemplatesParts = stylesTemplatesParts;
exports.blockStyles = blockStyles;
exports.images = images;
exports.scripts = scripts;
exports.scriptsTemplates = scriptsTemplates;
exports.scriptsTemplateParts = scriptsTemplateParts;
exports.blockScripts = blockScripts;
exports.watching = watching;

exports.default = parallel(
  styles,
  stylesTemplates,
  stylesTemplatesParts,
  blockStyles,
  images,
  scripts,
  scriptsTemplates,
  scriptsTemplateParts,
  blockScripts,
  watching
);
exports.build = series(
  styles,
  images,
  scripts,
  stylesTemplates,
  stylesTemplatesParts,
  scriptsTemplates,
  scriptsTemplateParts,
  blockScripts,
  blockStyles
);
