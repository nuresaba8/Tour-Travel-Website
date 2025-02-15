const { Builder, By, until } = require("selenium-webdriver");
 
(async function loginTest() {
  let driver = await new Builder().forBrowser("chrome").build();
 
  try {
    await driver.get("http://localhost/Project/view/login.php");
 
    await driver.findElement(By.id("username")).sendKeys("saba");
    await driver.sleep(2000);
    await driver.findElement(By.id("password")).sendKeys("saba@123");
    await driver.sleep(2000);
 
    await driver.findElement(By.css('input[type="submit"][name="submit"]')).click();

 
    // Wait for a successful response
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
 