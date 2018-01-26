const magentoData = require('prefab/MindCandy_Prefab/lib/magento-data');
const rimraf = require('rimraf');

rimraf(
    magentoData.build_dir,
    () => console.log(`Build directory cleared for ${magentoData.store_code}`)
);