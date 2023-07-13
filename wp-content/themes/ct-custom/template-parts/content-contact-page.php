<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CT_Custom
 */

// Get the theme settings
$theme_settings = get_option('theme_settings');

// Phone number
$phone_number = $theme_settings['phone_number'] ?? '';

// Address information and break the text after 'street'
$address_info = str_replace("Street", "Street<br>", $theme_settings['address_info'] ?? '');

// Fax number
$fax_number = $theme_settings['fax_number'] ?? '';

// Social media links
$facebook_link = $theme_settings['facebook_link'] ?? '';
$twitter_link = $theme_settings['twitter_link'] ?? '';
$linkedin_link = $theme_settings['linkedin_link'] ?? '';
$pinterest_link = $theme_settings['pinterest_link'] ?? '';

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<div class="description-section">
            <h2 class="page-title">Contact</h2>
            <p class="page-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam posuere ipsum nec velit mattis elementum. Cum sociis natoque<br>penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas eu placerat metus, eget placerat libero.</p>
        </div>
        <div class="form-details-section">
            <div class="form-column">
                <h3>CONTACT US</h3>
                <hr>
                <form>
                    <div class="form-row">
                        <input type="text" id="name" name="name" placeholder="Name *" required>
                    </div>
                    <div class="form-row two-cols">
                        <div class="form-col">
                            <input type="text" id="phone" name="phone" placeholder="Phone *" required>
                        </div>
                        <div class="form-col">
                            <input type="email" id="email" name="email" placeholder="Email *" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <textarea id="message" name="message" placeholder="Message *" required></textarea>
                    </div>
                    <div class="form-row">
                        <button type="submit">Submit</button>
                    </div>
                </form>
            </div>
            <div class="details-column">
                <h3>REACH US</h3>
                <hr>
                <h6>Coalition Skills Test</h6>
                <p class="address"><?php echo $address_info; ?></p>
                <p>Phone: <?php echo $phone_number; ?><br>Fax: <?php echo $fax_number; ?></p>
                <div class="social-icons">
                    <a href="<?php echo $facebook_link; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="<?php echo $twitter_link; ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="<?php echo $linkedin_link; ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                    <a href="<?php echo $pinterest_link; ?>" target="_blank"><i class="fab fa-pinterest"></i></a>
                </div>
            </div>
        </div>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
