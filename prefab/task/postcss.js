const magentoData = require('prefab/MindCandy_Prefab/lib/magento-data');
const run = require('prefab/MindCandy_Prefab/lib/run');

run(`postcss -r -c prefab/MindCandy_Prefab/postcss.config.js ${magentoData.output_dir}/**/*.css`);
