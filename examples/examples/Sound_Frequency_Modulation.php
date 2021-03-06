<!DOCTYPE html>

  <?php include('../../header.php'); ?>
  <body id="learn-page">

    <?php include('../../sidebar.php'); ?>

    <!-- content sections -->
    <div class="column-span">
      <section>
          <p id="backlink"><a href="../#examples">< Back to Examples</a></p>
          <h2>Frequency Modulation</h2>
          <p><p>Frequency Modulation is a powerful form of synthesis.
 In its simplest form, FM involves two oscillators, referred
 to as the carrier and the modulator. As the modulator's waveform oscillates
 between some minimum and maximum amplitude value, that momentary value
 is added to ("modulates") the frequency of the carrier.</p>
 <p>The <b>carrier</b> is typically set to oscillate at an audible frequency
 that we perceive as a pitch—in this case, it is a sine wave oscilaltor at 220Hz,
 equivalent to an "A3" note. The carrier is connected to master output by default
 (this is the case for all p5.Oscillators).</p>
 <p>We will <code>disconnect</code> the <b>modulator</b> from master output,
 and instead connect to the frequency of the carrier:
 <code>carrier.freq(modulator)</code>. This adds the output amplitude of the
 modulator to the frequency of the carrier.</p>
 <p>
 <b>Modulation Depth</b> describes how much the carrier frequency will modulate.
 It is based on the amplitude of the modulator.
 The modulator produces a continuous stream of amplitude values that we will add
 to the carrier frequency. An amplitude of zero means silence, so the modulation will
 have no effect. An amplitude of 1.0 scales the range of output values
 between +1.0 and -1.0. That is the standard range for sound that gets sent to
 your speakers, but in FM we are instead sending the modulator's output to the carrier frequency,
 where we'd barely notice the +1Hz / -1Hz modulation.
 So we will typically increase the amplitude ("depth") of the modulator to numbers much higher than what
 we might send to our speakers.</p>
 <p><b>Modulation Frequency</b> is the speed of modulation. When the modulation frequency is lower
 than 20Hz, we stop hearing its frequency as pitch, and start to hear it as a beating rhythm.
 For example, try 7.5Hz at a depth of 20 to mimic the "vibrato" effect of an operatic vocalist.
 The term for this is Low Frequency Oscillator, or LFO. Modulators set to higher frequencies can
 also produce interesting effects, especially when the frequency has a harmonic relationship
 to the carrier signal. For example, listen to what happens when the modulator's frequency is
 half or twice that of the carrier. This is the basis for FM Synthesis, developed by John Chowning
 in the 1960s, which came to revolutionize synthesis in the 1980s and is often used to synthesize
 brass and bell-like sounds.
 
 <p>In this example,</p><p>
 - MouseX controls the modulation depth (the amplitude of the modulator) from -150 to 150.
 When the modulator's amplitude is set to 0 (in the middle), notice how the modulation
 has no effect. The greater (the absolute value of) the number, the greater the effect.
 If the modulator waveform is symetrical like a square <code>[]</code>, sine <code>~</code>
 or triangle <code>/\</code>, the negative amplitude will be the same as positive amplitude.
 But in this example, the modulator is an asymetrical sawtooth wave, shaped like this /.
 When we multiply it by a negative number, it goes backwards like this \. To best
 observe the difference, try lowering the frequency.
 </p>
 <p>- MouseY controls the frequency of the modulator from 0 to 112 Hz.
 Try comparing modulation frequencies below the audible range (which starts around 20hz),
 and above it, especially in a harmonic relationship to the carrier frequency (which is 220hz, so
 try half that, 1/3, 1/4 etc...).
 *
 <p><em><span class="small">You will need to include the 
 <a href="http://p5js.org/reference/#/libraries/p5.sound">p5.sound library</a>
 for this example to work in your own project.</em></span></p>
 </p>

          <div id="exampleDisplay">
            <iframe id="exampleFrame" src="example.html" ></iframe>
            <div class="edit_space">
              <button id="runButton" class="edit_button">run</button>
              <button id="resetButton" class="reset_button">reset</button>
            </div>
            <div id="exampleEditor"></div>
          </div>

          <p><a style="border-bottom:none !important;" href="http://creativecommons.org/licenses/by-nc-sa/4.0/" target=_blank><img src="http://i.creativecommons.org/l/by-nc-sa/4.0/88x31.png" style="width:88px"/></a></p>
      </section>

      <?php include('../../footer.php'); ?>
    </div><!-- end column-span -->

    <!-- outside of column for footer to go across both -->

    <p class="clearfix"> &nbsp; </p>

    <object type="image/svg+xml" data="../../img/thick-asterisk-alone.svg" id="asterisk-design-element">
         *<!-- to do: add fallback image in CSS -->
    </object>

    <?php include('../../end.php'); ?>

    <script src="../../js/vendor/ace-nc/ace.js"></script>
    <script src="../../js/examples.js"></script>
    <script>
      $(document).ready( function () {
          examples.init('../examples_src/33_Sound/21_FreqModulation.js');
      });
    </script>
  </body>
</html>