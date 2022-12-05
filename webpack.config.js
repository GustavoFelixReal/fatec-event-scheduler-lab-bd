const path = require('path');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CssMinimizerWebpackPlugin = require("css-minimizer-webpack-plugin");
const Webpack = require("webpack");

module.exports = {
  entry: "./js/index.js",
  output: {
    filename: "bundle.js",
    path: path.resolve(__dirname, "dist"),
    clean: true,
  },
  module: {
    rules: [
      {
        test: /\.css$/,
        use: [MiniCssExtractPlugin.loader, "css-loader"],
      },
    ]
  },
  optimization: {
    minimize: true,
    minimizer: [new CssMinimizerWebpackPlugin(), "..."],
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: "style.css",
    }),
    new Webpack.optimize.ModuleConcatenationPlugin(),
  ],
  devServer: {
    static: {
      directory: path.resolve(__dirname, "dist"),
    },
    port: 3000,
  },
}