const magentoData = require('prefab/MindCandy_Prefab/lib/magento-data');
const rimraf = require('rimraf');

rimraf(
    magentoData.output_dir,
    () => console.log(`Public directory cleared for ${magentoData.store_code}`)
);