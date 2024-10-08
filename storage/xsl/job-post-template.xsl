<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="/">
        <html>
            <head>
                <style>
                    table {
                    border-collapse: collapse;
                    overflow: hidden;
                    border-radius: 10px;
                    }

                    tr:nth-of-type(odd) {
                    background: #eee;
                    }

                    th {
                    background: #7691ab;
                    color: white;
                    font-weight: bold;
                    }

                    td, th {
                    padding: 10px;
                    border: 1px solid #ccc;
                    text-align: left;
                    font-size: 18px;
                    }
                </style>
            </head>
            <body>
                <h2>Job Listings</h2>


                                <table border="1">
                                    <tr>
                                        <th>Job ID</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Location</th>
                                        <th>Min Salary</th>
                                        <th>Max Salary</th>
                                        <th>Period</th>
                                        <th>Mode</th>
                                        <th>Type</th>

                                    </tr>
                                    <xsl:for-each select="jobs/job">
                                        <tr>
                                            <td>
                                                <xsl:value-of select="id"/>
                                            </td>
                                            <td>
                                                <xsl:value-of select="name"/>
                                            </td>
                                            <td>
                                                <xsl:value-of select="description"/>
                                            </td>
                                            <td>
                                                <xsl:value-of select="location"/>
                                            </td>
                                            <td>
                                                <xsl:value-of select="min_salary"/>
                                            </td>
                                            <td>
                                                <xsl:value-of select="max_salary"/>
                                            </td>
                                            <td>
                                                <xsl:value-of select="period"/>
                                            </td>
                                            <td>
                                                <xsl:value-of select="mode"/>
                                            </td>
                                            <td>
                                                <xsl:value-of select="type"/>
                                            </td>
                                        </tr>
                                    </xsl:for-each>
                                </table>


            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
