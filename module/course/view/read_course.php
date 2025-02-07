<div id="contenido" style="font-family: Arial, sans-serif; margin: 20px;">
    <h1 style="text-align: center; color: #333;">Course Information</h1>
    <div style="margin: 20px auto; max-width: 600px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); border-radius: 8px; overflow: hidden;">
        <table style="width: 100%; border-collapse: collapse; font-size: 16px; color: #333;">
            <tr style="    background-color: #cecece;">
                <th style="text-align: left; padding: 12px; border-bottom: 1px solid #ddd;">Field</th>
                <th style="text-align: left; padding: 12px; border-bottom: 1px solid #ddd;">Value</th>
            </tr>
            <tr>
                <td style="padding: 12px; border-bottom: 1px solid #ddd;">Course ID:</td>
                <td style="padding: 12px; border-bottom: 1px solid #ddd;">
                    <?php echo $course['id_course']; ?>
                </td>
            </tr>
            <tr>
                <td style="padding: 12px; border-bottom: 1px solid #ddd;">Name:</td>
                <td style="padding: 12px; border-bottom: 1px solid #ddd;">
                    <?php echo $course['name_course']; ?>
                </td>
            </tr>
            <tr>
                <td style="padding: 12px; border-bottom: 1px solid #ddd;">Description:</td>
                <td style="padding: 12px; border-bottom: 1px solid #ddd;">
                    <?php echo $course['description_course']; ?>
                </td>
            </tr>
            <tr>
                <td style="padding: 12px; border-bottom: 1px solid #ddd;">Category:</td>
                <td style="padding: 12px; border-bottom: 1px solid #ddd;">
                    <?php echo $course['category_course']; ?>
                </td>
            </tr>
            <tr>
                <td style="padding: 12px; border-bottom: 1px solid #ddd;">Level:</td>
                <td style="padding: 12px; border-bottom: 1px solid #ddd;">
                    <?php echo $course['level_course']; ?>
                </td>
            </tr>
            <tr>
                <td style="padding: 12px; border-bottom: 1px solid #ddd;">Price:</td>
                <td style="padding: 12px; border-bottom: 1px solid #ddd;">
                    <?php echo $course['price_course'] . ' €'; ?>
                </td>
            </tr>
            <tr>
                <td style="padding: 12px; border-bottom: 1px solid #ddd;">Language:</td>
                <td style="padding: 12px; border-bottom: 1px solid #ddd;">
                    <?php echo $course['language_course']; ?>
                </td>
            </tr>
            <tr>
                <td style="padding: 12px; border-bottom: 1px solid #ddd;">Start date:</td>
                <td style="padding: 12px; border-bottom: 1px solid #ddd;">
                    <?php echo $course['datestart_course']; ?>
                </td>
            </tr>
            <tr>
                <td style="padding: 12px;">End date:</td>
                <td style="padding: 12px;">
                    <?php echo $course['dateend_course']; ?>
                </td>
            </tr>
        </table>
    </div>
    <div style="text-align: center; margin-top: 20px;">
        <a href="index.php?pages=controller_course&op=list" style="text-decoration: none; color: white; background-color: #007BFF; padding: 10px 20px; border-radius: 5px; display: inline-block;">Back</a>
    </div>
</div>