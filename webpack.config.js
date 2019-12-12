var Encore = require('@symfony/webpack-encore');
if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}
Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    //.setManifestKeyPrefix('build/')
    .addEntry('app_js', './assets/js/app.js')
    .addEntry('app_css', './assets/css/app.css')
    .splitEntryChunks()
    .enableSingleRuntimeChunk()
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    .configureBabelPresetEnv((config) => {
        config.useBuiltIns = 'usage';
        config.corejs = 3;
    })
    .enableSassLoader()
    //.enableTypeScriptLoader()
    //.enableIntegrityHashes(Encore.isProduction())
    //.autoProvidejQuery()
    //.enableReactPreset()
    //.addEntry('admin', './assets/js/admin.js')
;

module.exports = Encore.getWebpackConfig();
