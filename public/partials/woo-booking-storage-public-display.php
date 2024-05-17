<?php
/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://https://www.fiverr.com/mauro_gaitan
 * @since      1.0.0
 *
 * @package    Woo_Booking_Storage
 * @subpackage Woo_Booking_Storage/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<?php
$today = current_time('timestamp');

$tomorrow = strtotime('+1 day', $today);

$today_date = date_i18n('d/m/Y', $today);

$tomorrow_date = date_i18n('d/m/Y', $tomorrow);
?>
<div class="woo-booking-storage">
  <div class="row form-columns">
    <div class="col-md-3">

        <div class="navigator h-100 flex-column justify-content-between align-items-center">
            <span>
                <i class="bi bi-arrow-up-circle"></i>
            </span>

            <div class="dots">
                <span class="dot active"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
           
            <span>
                <i class="bi bi-arrow-down-circle"></i>
            </span>
        </div>
      

    </div>
    <div class="col-md-9">
        <div class="form-booking">

           <section>
                <header class="step-counter">
                        <span>Paso 1/3</span>
                </header>
                <div class="booking-steps">
                    <div class="step1">
                        <p class="step-title"><?=__("Selecciona las fechas")?></p>
                        <form id="step-one-form" action="">
                            <div class="date-range">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom01"><?=__("Fecha inicio")?></label>
                                        <input type="date" value="<?=$today_date;?>" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom01"><?=__("Fecha fin")?></label>
                                        <input type="date"  value="<?=$tomorrow_date;?>" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
                                    </div>
                                </div>
                            </div>
                            <div><button class="btn btn-primary float-end " id="step-one-submit" type="submit">Elegir fechas</button></div>
                        </form>

                    </div>
                </div>
           </section>
        </div>
    </div>
  </div>
</div>
