<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="/">
        <html>
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
