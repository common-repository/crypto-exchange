<?php
/*
Plugin Name: Cryptocurrency Exchange
Plugin URI: https://wpcryptoexchange.com
Description: Extremely simple way to launch your own decentralized crypto exchange on wordpress.
Version: 1.15
Author: Alon Goren
Author URI: https://drapergorenholm.com
License: GPL2
*/

function cryptoexchange_function(){

$default_contract_address = '0x5180d531C7113C2F7Dcbfc78c8462c6b9b45758f';
$custom_contract_address = get_option('custom_contract_address');
$contract_address = !empty($custom_contract_address) ? $custom_contract_address : $default_contract_address;

    return '<script>
    const config = {
      sourceAssetAddress: null,
      sourceAmountDecimal: null,
      destinationAssetAddress: null,
      destinationAmountDecimal: null,
      apiKey: "5a8d0a24-7cce-4b3e-9203-1d88034dd64e",
      partnerContractAddress: "'. $contract_address .'",
    };
    const nodeId = "totle-widget";
    !function(){const t=document.createElement("script");t.type="text/javascript";const e=()=>{TotleWidget.default.run(config,document.getElementById(nodeId))};t.readyState?t.onreadystatechange=function(){"loaded"!=t.readyState&&"complete"!=t.readyState||(t.onreadystatechange=null,e())}:t.onload=function(){e()},t.src="https://widget.totle.com/latest/dist.js",document.getElementsByTagName("head")[0].appendChild(t)}();                                                                                                                                                      
</script><p><center><small><b>Swap your tokens below to get the best prices across all decentralized crypto exchanges.</b></small></center></p><div id="totle-widget"></div><p></p></html>';  
}   

add_shortcode('wpdex', 'cryptoexchange_function');

add_action('admin_menu', 'cryptoexchange_menu');
 
function cryptoexchange_menu(){
        add_menu_page( 'Crypto Exchange Advanced Options', 'Crypto Exchange', 'manage_options', 'cryptoexchange-plugin', 'cryptoexchange_init','data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgdmVyc2lvbj0iMS4xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiBwcmVzZXJ2ZUFzcGVjdFJhdGlvPSJ4TWlkWU1pZCBtZWV0IiB2aWV3Qm94PSIwIDAgNjQwIDY0MCIgd2lkdGg9IjY0MCIgaGVpZ2h0PSI2NDAiPjxkZWZzPjxwYXRoIGQ9Ik0xMi41NSAzOTIuMTRDOC43OSAzOTIuMTQgNS43MiAzOTUuMzcgNS43MiAzOTkuMzFDNS43MiA0MDQuNjggNS43MiA0NDcuNjYgNS43MiA0NTMuMDRDNS43MiA0NTYuOTggOC43OSA0NjAuMiAxMi41NSA0NjAuMkM0Ni45OCA0NjAuMiAyMTkuMTQgNDYwLjIgNTI5LjA0IDQ2MC4yQzQ1NS4xNSA1NTguNTMgNDE0LjEgNjEzLjE1IDQwNS44OSA2MjQuMDhDNDAyLjM5IDYyOC43NCA0MDUuNTUgNjM1LjcyIDQxMS4yNyA2MzUuNzJDNDE3LjQ1IDYzNS43MiA0NjYuOTUgNjM1LjcyIDQ3My4xNCA2MzUuNzJDNDc3LjMyIDYzNS43MiA0ODEuMjUgNjMzLjc1IDQ4My44OSA2MzAuMjZDNDk4LjMgNjExLjA5IDYxMy41NCA0NTcuNyA2MjcuOTUgNDM4LjUzQzY0Mi4wMyA0MTkuNzIgNjI5LjMxIDM5Mi4xNCA2MDYuNDQgMzkyLjE0QzQ4Ny42NiAzOTIuMTQgNzEuOTQgMzkyLjE0IDEyLjU1IDM5Mi4xNFpNMTEwLjUyIDE4MC44QzE4NC40MSA4Mi40NyAyMjUuNDYgMjcuODUgMjMzLjY3IDE2LjkyQzIzNy4xNyAxMi4yNiAyMzQuMDEgNS4yOCAyMjguMjkgNS4yOEMyMjIuMSA1LjI4IDE3Mi42MSA1LjI4IDE2Ni40MiA1LjI4QzE2Mi4yNCA1LjI4IDE1OC4zMSA3LjI1IDE1NS42NyAxMC43NEMxNDEuMjYgMjkuOTEgMjYuMDEgMTgzLjMgMTEuNjEgMjAyLjQ3Qy0yLjQ3IDIyMS4yOCAxMC4yNCAyNDguODYgMzMuMDMgMjQ4Ljg2QzkyLjQzIDI0OC44NiA1NjcuNjEgMjQ4Ljg2IDYyNy4wMSAyNDguODZDNjMwLjc3IDI0OC44NiA2MzMuODQgMjQ1LjYzIDYzMy44NCAyNDEuNjlDNjMzLjg0IDIzNi4zMiA2MzMuODQgMTkzLjM0IDYzMy44NCAxODcuOTZDNjMzLjg0IDE4NC4wMiA2MzAuNzcgMTgwLjggNjI3LjAxIDE4MC44QzU1OC4xNCAxODAuOCAzODUuOTggMTgwLjggMTEwLjUyIDE4MC44WiIgaWQ9ImIxTHhXbUhDMzciPjwvcGF0aD48L2RlZnM+PGc+PGc+PGc+PHVzZSB4bGluazpocmVmPSIjYjFMeFdtSEMzNyIgb3BhY2l0eT0iMSIgZmlsbD0iIzAwMDAwMCIgZmlsbC1vcGFjaXR5PSIxIj48L3VzZT48Zz48dXNlIHhsaW5rOmhyZWY9IiNiMUx4V21IQzM3IiBvcGFjaXR5PSIxIiBmaWxsLW9wYWNpdHk9IjAiIHN0cm9rZT0iIzAwMDAwMCIgc3Ryb2tlLXdpZHRoPSIxIiBzdHJva2Utb3BhY2l0eT0iMCI+PC91c2U+PC9nPjwvZz48L2c+PC9nPjwvc3ZnPg==' );
}
 
function cryptoexchange_init(){ ?>

<h2>How to use the Cryptocurrency Exchange Plugin:</h2>
<p>All you have to do is put the shortcode [wpdex] in any post or page.</p>
<p>If you have any questions, comments or want to watch any tutorials, goto <a href="https://wpcryptoexchange.com">https://wpcryptoexchange.com</a></p>
<p /><p>If you or anyone you know is launching a blockchain startup, make sure they submit their pitch deck to my venture firm <a href="https://drapergorenholm.com">Draper Goren Holm</a>.  We want to write the first check to all the best blockchain startups!</p>

<div class="wrap">
<h2>Cryptocurrency Exchange Plugin Advanced Features</h2>
<p><b><font color=red>CHANGING THIS CAN BREAK EVERYTHING!  DON'T DO IT UNLESS YOU KNOW WHAT YOU'RE DOING!</font></b></p>
<p>Now that I have sufficiently scared you, this field is where you can paste in your Totle Partner Fee Contract address, if you've created one.  If not, and you'd like to charges fees on all the trades that happen on your site, <a href="https://www.wpcryptoexchange.com/how-to-take-fees-on-your-your-wordpress-crypto-exchange/">follow this tutorial</a> to learn how to do it.</p>

<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>

<table class="form-table">
<tr valign="top">
<th scope="row">Custom Contract Address</th>
<td><input type="text" name="custom_contract_address" value="<?php echo get_option('custom_contract_address'); ?>" /></td>
</tr>
</table>
<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="custom_contract_address" />
<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>
</form>
</div>


<?php
}
?>