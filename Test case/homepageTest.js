
const { Builder, By, until } = require('selenium-webdriver');
const assert = require("assert");


(async function homepageTest() {

  let driver;

  try {
    driver= await new Builder().forBrowser('chrome').build();
    await driver.get('http://localhost/Project/view/home.php');
    await driver.sleep(2000);

   let title= await driver.getTitle();
   console.log("******Home Page Title=  " + title);
   assert.equal("Home", title);
    


   let url= await driver.getCurrentUrl();
   console.log("*****Current Url= " + url);

   
   
    await driver.wait(until.alertIsPresent(), 5000);
    const alert = await driver.switchTo().alert();
    console.log("Test passed: " + (await alert.getText()));
    alert.accept();

  } catch (error) {
    console.error("Test failed:", error);
  } finally {
    await driver.quit();
  }
})();


