const { Builder, By, until } = require("selenium-webdriver");

(async function testReservationForm() {
    let driver = await new Builder().forBrowser('chrome').build();
    try {
        await driver.get("http://localhost/Project/view/login.php");

        const currentUrl = await driver.getCurrentUrl();
        if (currentUrl.includes('login.php')) {
            await driver.findElement(By.id("username")).sendKeys("saba");
            await driver.findElement(By.id("password")).sendKeys("saba@123");
            await driver.findElement(By.css('input[type="submit"][name="submit"]')).click();
            await driver.wait(until.urlContains('home1.php'), 5000);
        }

        await driver.navigate().to("http://localhost/Project/view/editprofile.php");
        await driver.sleep(3000);
     
        await driver.wait(until.elementLocated(By.name("name")), 30000);
        await driver.wait(until.elementLocated(By.name("email")), 30000);
        await driver.wait(until.elementLocated(By.name("gender")), 30000);
        await driver.wait(until.elementLocated(By.name("submit")), 30000);
     
        await driver.findElement(By.name("name")).sendKeys("John Doe");
        await driver.findElement(By.name("email")).sendKeys("john.doe@example.com");
        await driver.findElement(By.css("input[name='gender'][value='Male']")).click();
        await driver.sleep(2000);
        await driver.findElement(By.name("submit")).click();
        await driver.sleep(3000);

        await driver.wait(until.alertIsPresent(), 5000);
        const alert = await driver.switchTo().alert();
        alert.accept();

        await driver.sleep(3000);

    } catch (error) {
        console.error("Test failed:", error);
    } finally {
        await driver.quit();
    }
})();
