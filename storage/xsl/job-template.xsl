<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="/">
        <html>
            <head>
                <style>
                    body {
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 0;
                    background-color: #f4f4f4;
                    }
                    .container {
                    max-width: 1200px;
                    margin: 0 auto;
                    padding: 20px;
                    display: flex;
                    flex-wrap: wrap;
                    }
                    section {
                    width: 66.66%;
                    padding: 15px;
                    }
                    aside {
                    width: 33.33%;
                    padding: 15px;
                    }
                    .article {
                    background-color: white;
                    padding: 20px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    margin-bottom: 20px;
                    }
                    .article h2 {
                    font-size: 28px;
                    font-weight: bold;
                    color: #333;
                    margin-bottom: 10px;
                    }
                    .article p {
                    font-size: 14px;
                    color: #555;
                    margin-bottom: 10px;
                    }
                    .section-title {
                    font-size: 16px;
                    font-weight: bold;
                    color: #1a202c;
                    margin-bottom: 8px;
                    }
                    .section-content {
                    margin-bottom: 20px;
                    }
                    .flex-row {
                    display: flex;
                    justify-content: space-between;
                    }
                    .company-info {
                    background-color: white;
                    padding: 20px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    }
                    .company-info img {
                    border-radius: 50%;
                    width: 100px;
                    height: 100px;
                    }
                    .company-info h3 {
                    font-size: 22px;
                    font-weight: bold;
                    color: #333;
                    margin-top: 10px;
                    }
                    .company-info p {
                    font-size: 14px;
                    color: #555;
                    }
                </style>
            </head>
            <body>
                <xsl:for-each select="job/jobDetail">
                    <div class="container">
                        <!-- Posts Section -->
                        <section>
                            <div class="article">
                                <h2 class="job-title">
                                    <xsl:value-of select="name"/>
                                </h2>

                                <h3 class="section-title">Job Description</h3>
                                <p class="section-content">
                                    <xsl:value-of select="description"/>
                                </p>


                                <div>
                                    <h3 class="section-title">Location</h3>
                                    <p class="section-content">
                                        <xsl:value-of select="location"/>
                                    </p>
                                </div>
                                <div>
                                    <h3 class="section-title">Period</h3>
                                    <p class="section-content">
                                        <xsl:value-of select="period"/>
                                    </p>
                                </div>


                                <div>
                                    <h3 class="section-title">Salary</h3>
                                    <p class="section-content">RM
                                        <xsl:value-of select="min_salary"/> - RM
                                        <xsl:value-of select="max_salary"/>
                                    </p>
                                </div>
                                <div>
                                    <h3 class="section-title">Mode</h3>
                                    <p class="section-content">
                                        <xsl:value-of select="mode"/>
                                    </p>
                                </div>
                                <div>
                                    <h3 class="section-title">Type</h3>
                                    <p class="section-content">
                                        <xsl:value-of select="type"/>
                                    </p>
                                </div>


                            </div>
                        </section>

                        <!-- Company Information -->
                        <aside>
                            <div class="company-info">
                                <h3>
                                    <xsl:value-of select="company/name"/>
                                </h3>
                                <p>
                                    <xsl:value-of select="company/address"/>
                                </p>
                                <p>
                                    <xsl:value-of select="company/description"/>
                                </p>
                            </div>
                        </aside>
                    </div>

                </xsl:for-each>

            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
