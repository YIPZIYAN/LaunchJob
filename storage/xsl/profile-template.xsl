<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="/">
        <html>
            <body>
                <h2>Profile</h2>
                <table border="1">
                    <xsl:for-each select="profile/details">
                        <tr>
                            <td><strong>ID:</strong></td>
                            <td><xsl:value-of select="id"/></td>
                        </tr>
                        <tr>
                            <td><strong>Name:</strong></td>
                            <td><xsl:value-of select="name"/></td>
                        </tr>
                        <tr>
                            <td><strong>Email:</strong></td>
                            <td><xsl:value-of select="email"/></td>
                        </tr>
                        <!-- Check if it's an employee -->
                        <xsl:if test="employee">
                            <tr>
                                <td><strong>Profession:</strong></td>
                                <td><xsl:value-of select="employee/profession"/></td>
                            </tr>
                            <tr>
                                <td><strong>About:</strong></td>
                                <td><xsl:value-of select="employee/about"/></td>
                            </tr>
                        </xsl:if>
                        <!-- Check if it's a company -->
                        <xsl:if test="company">
                            <tr>
                                <td><strong>Company Name:</strong></td>
                                <td><xsl:value-of select="company/company_name"/></td>
                            </tr>
                            <tr>
                                <td><strong>Address:</strong></td>
                                <td><xsl:value-of select="company/address"/></td>
                            </tr>
                            <tr>
                                <td><strong>Description:</strong></td>
                                <td><xsl:value-of select="company/description"/></td>
                            </tr>
                        </xsl:if>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
