<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="/">
        <html>
            <head>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        margin: 20px;
                        background-color: #f0f0f0;
                    }
                    h2 {
                        color: #2c3e50;
                        border-bottom: 2px solid #2980b9;
                        padding-bottom: 5px;
                    }
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin: 20px 0;
                        background-color: #fff;
                        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                    }
                    th {
                        background-color: #2980b9;
                        color: #fff;
                        padding: 10px;
                        text-align: left;
                    }
                    td {
                        padding: 10px;
                        border: 1px solid #ddd;
                    }
                    tr:nth-child(even) {
                        background-color: #f2f2f2;
                    }
                    tr:hover {
                        background-color: #dfe6e9;
                    }
                </style>
            </head>
            <body>
                <h2>Job Title: <xsl:value-of select="/job-applications/@job-name" /></h2>
                <h2>Applicant List (<xsl:value-of select="count(//applicant)" />)</h2>

                <table border="1">
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Profession</th>
                        <th>About</th>
                    </tr>
                    <xsl:for-each select="//applicant">
                        <tr>
                            <td><xsl:value-of select="position()"/></td>
                            <td><xsl:value-of select="name"/></td>
                            <td><xsl:value-of select="email"/></td>
                            <td><xsl:value-of select="profession"/></td>
                            <td><xsl:value-of select="about"/></td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
