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

        // Navigate to the reservation page directly
        await driver.get('http://localhost/Project/view/reservation.php');
        
        // Wait for the reservation page to load by checking the URL
        await driver.wait(until.urlContains('reservation.php'), 5000);

        // Now fill out the reservation form
        await driver.findElement(By.id('name')).sendKeys('Saba');
        await driver.findElement(By.id('age')).sendKeys('25');
        await driver.findElement(By.id('email')).sendKeys('saba@gmail.com');
        await driver.findElement(By.id('contact_number')).sendKeys('01307862696');
        await driver.findElement(By.id('check_in_date')).sendKeys('2024-12-10');
        await driver.findElement(By.id('hotel_name')).sendKeys('Hotel 1');
        await driver.findElement(By.id('room_type')).sendKeys('AC');
        await driver.findElement(By.id('number_of_people')).sendKeys('3');

        const filePath = 'C:\\Users\\USER\\Downloads\\Assignment_D_Mid_Fall 24-25.pdf';
        console.log('File Path:', filePath);

        await driver.wait(until.elementIsVisible(driver.findElement(By.id('myfile'))), 10000);
        await driver.findElement(By.id('myfile')).sendKeys(filePath);

        const submitButton = await driver.findElement(By.css('input[type="submit"][name="submit"]'));
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
