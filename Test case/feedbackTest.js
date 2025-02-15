const { Builder, By, until } = require("selenium-webdriver");

(async function testReservationForm() {
    let driver = await new Builder().forBrowser('chrome').build();
    try {
        // Navigate to the login page
        await driver.get("http://localhost/Project/view/login.php");

        // Check if we're on the login page by examining the URL or checking for an element
        const currentUrl = await driver.getCurrentUrl();
        if (currentUrl.includes('login.php')) {
            console.log("Redirected to login page, logging in...");

            // Perform login
            await driver.findElement(By.id("username")).sendKeys("saba");
            await driver.findElement(By.id("password")).sendKeys("saba@123");
            await driver.findElement(By.css('input[type="submit"][name="submit"]')).click();

            // Wait for the page to load after login (ensure we are on the homepage or dashboard)
            await driver.wait(until.urlContains('home1.php'), 5000);  // Ensure successful login by checking URL change
            console.log("Logged in successfully, now navigating to reservation page.");
        }

        // Navigate to the customer feedback page
        await driver.get('http://localhost/Project/view/customer_feedback.php');
        
        // Wait for the customer feedback page to load
        await driver.wait(until.urlContains('customer_feedback.php'), 5000);

        // Wait for the 'type' element to be visible
        await driver.wait(until.elementIsVisible(driver.findElement(By.id('type'))), 10000);

        // Now fill out the feedback form
        await driver.findElement(By.css('input[name="type"][value="Tour"]')).click();
 
        await driver.findElement(By.id('serviceName')).sendKeys('Cox bazar');
        await driver.findElement(By.id('review')).sendKeys('I will go to cox bazar on next thursday IN Sha Allah');

        // Find and click the submit button
        const submitButton = await driver.findElement(By.css('input[type="button"][name="submit"]'));
        await driver.wait(until.elementIsVisible(submitButton), 5000);
        const isEnabled = await submitButton.isEnabled();
        if (!isEnabled) {
            console.log('Submit button is not enabled');
            return;
        }

        await submitButton.click();

        // Wait for alert to appear and accept it
        await driver.wait(until.alertIsPresent(), 5000);
        const alert = await driver.switchTo().alert();
        console.log("Test passed: " + (await alert.getText()));
        alert.accept();

        await driver.sleep(2000);  // Add delay after alert handling

    } catch (error) {
        console.error("Test failed:", error);
    } finally {
        await driver.quit();
    }
})();
