module.exports = {
    outputDir: '../public/',
    indexPath: '../resources/views/index.php',
    assetsDir: './assets/',
    publicPath: '/',
    devServer: {
        disableHostCheck: true,
        overlay: {
            warnings: false,
            errors: true
        }
    },
    runtimeCompiler: true,
    configureWebpack: {
        performance: {
            hints: process.env.NODE_ENV !== 'production' ? "warning" : false
        }
    },
};
