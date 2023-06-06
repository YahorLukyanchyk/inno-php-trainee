const path = require("path");
const glob = require("glob");

module.exports = {
    entry: {'js': glob.sync('./src/javascript/*.js')},
    output: {
        path: path.resolve(__dirname, "public/assets/javascript"),
        clean: true,
        filename: "script.js"
    }
}