const path = require("path");
const glob = require("glob");
const TerserPlugin = require("terser-webpack-plugin");

module.exports = {
    entry: {'js': glob.sync('./src/javascript/*.js')},
    output: {
        path: path.resolve(__dirname, "public/assets/javascript"),
        clean: true,
        filename: "script.min.js"
    },
    module: {
        rules: [
            {
                test: /\.css$/,
                use: [
                    'style-loader',
                    'css-loader'
                ],
            }
        ]
    },
    optimization: {
        minimize: true,
        minimizer: [
            new TerserPlugin({
                terserOptions: {
                    keep_fnames: true,
                },
            }),
        ],
    },
}