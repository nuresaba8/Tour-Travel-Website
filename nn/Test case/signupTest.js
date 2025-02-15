const { Builder, By, until } = require("selenium-webdriver");
 
(async function signupTest() {
  let driver = await new Builder().forBrowser("chrome").build();
 
  try {
    await driver.get("http://localhost/Project/view/registration.php");
 
    // Fill out the form fields
    await driver.findElement(By.id("name")).sendKeys("Nure Alam");
    await driver.findElement(By.id("email")).sendKeys("abduallahalam@gmail.com");
    await driver.findElement(By.id("username")).sendKeys("alam");
    await driver.findElement(By.id("password")).sendKeys("aB@12345");
    await driver.findElement(By.id("cpassword")).sendKeys("aB@12345");
    await driver.findElement(By.name("dob-day")).sendKeys("10");
    await driver.findElement(By.name("dob-month")).sendKeys("12");
    await driver.findElement(By.name("dob-year")).sendKeys("2000");
    await driver
      .findElement(By.css('input[name="gender"][value="male"]'))
      .click();
 
    // Submit the form
    await driver.findElement(By.id("submit")).click();
 
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
 