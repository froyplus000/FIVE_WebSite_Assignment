<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Add jobs Form" />
    <meta name="keywords" content="HTML, Form, tags" />
    <meta name="author" content="FIVE" />
    <link rel="stylesheet" href="./styles/style_1.css">

    <title>Add Job Vacancy</title>

    <body>
        <div class="container">
            <header>
                <h1>Add Job Vacancy</h1>
            </header>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="add_job.php">Add Job Vacancy</a></li>
                    <li><a href="search_job.php">Search Job Vacancy</a></li>
                    <li><a href="about.php">About Us </a></li>
                </ul>
            </nav>
            <main>
                <form action="add_job.php" method="post">
                    <fieldset>
                        <legend>Job Vacancy Details</legend>
                        <p>
                            <label for="job_title">Job Title:</label>
                            <input type="text" name="job_title" id="job_title" required="required" />
                        </p>
                        <p>
                            <label for="salary">Salary:</label>
                            <input type="text" name="salary" id="salary" required="required" />
                        </p>
                        <p>
                            <label for="location">Location:</label>
                            <input type="text" name="location" id="location" required="required" />
                        </p>
                        <p>
                            <label for="contract_type">Contract Type:</label>
                            <select name="contract_type" id="contract_type" required="required">
                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                                <option value="Casual">Casual</option>
                            </select>
                        </p>
                        <p>
                            <label for="closing_date">Closing Date:</label>
                            <input type="date" name="closing_date" id="closing_date" required="required" />
                        </p>

                        

                    </fieldset>
                    <fieldset>
                        <legend>Company Details</legend>
                        <p>
                            <label for="company_name">Company Name:</label>
                            <input type="text" name="company_name" id="company_name" required="required" />
                        </p>    
                        <p>
                            <label for="company_overview">Company Overview:</label>
                            <textarea name="company_overview" id="company_overview" rows="4" cols="50" required="required"></textarea>
                        </p>
                        <p>
                            <label for="Responsibilities">Responsibilities:</label>
                            <textarea name="Responsibilities" id="Responsibilities" rows="4" cols="50" required="required"></textarea>
                        </p>
                        <p>
                            <label for="Requirements">Requirements:</label>
                            <textarea name="Requirements" id="Requirements" rows="4" cols="50" required="required"></textarea>
                        </p>
                        <p>
                            <label for="Benefits">Benefits:</label>
                            <textarea name="Benefits" id="Benefits" rows="4" cols="50" required="required"></textarea>
                        </p>
                        <p>
                            <label for="travel_opportunities">Travel Opportunities:</label>
                            <textarea name="travel_opportunities" id="travel_opportunities" rows="4" cols="50" required="required"></textarea>
                        </p>
                        <p>
                            <label for="work_flexibility">Work flexibility:</label>
                            <textarea name="work_flexibility" id="work_flexibility" rows="4" cols="50" required="required"></textarea>
                        </p>

                    </fieldset>

                    <p>
                        <input type="submit" value="Add Job Vacancy" />
                        <input type="reset" value="Clear Form" />
                    </p>
                    
                </form>

    </body>