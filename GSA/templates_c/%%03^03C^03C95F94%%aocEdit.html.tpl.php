<?php /* Smarty version 2.6.20, created on 2012-09-13 10:30:50
         compiled from aocEdit.html.tpl */ ?>
<meta charset="utf-8" />
<link href='css/style.css' rel='stylesheet' type="text/css" />
<link href='css/admin.css' rel='stylesheet' type="text/css" />
<script type='text/javascript' src='js/checks.js'></script>
<script type='text/javascript' src='js/funciones.js'></script>
<div class="contenedor-gris">

<form name="aoc" id="aoc" method="post" action="cambiosOc.php ">
	<input type="button" name="cancel" id="cancel" value="" class="boton-cancel-menu" onclick="mimensaje()" style='font-size: 13px;'/>
	<input type="submit" name="enviar" id="enviar" value="" class="boton-guardar-oc" style='font-size: 13px;' />		
	<div class="contenedor-gris-blanco">
		<p class="instrucciones_cursivas">Datos Generales</p>
		<div id="formato2"style="font-size: 13px;">
			<div id="datos2" >
				<p style="font-size:13px;">OC_ID: <strong><?php echo $this->_tpl_vars['id']; ?>
</strong></p>
    			<p style="font-size:13px;">Descripción: <strong><?php echo $this->_tpl_vars['desc']; ?>
</strong></p>
    			<input type="hidden" name="ocid" id="ocid" value="<?php echo $this->_tpl_vars['id']; ?>
"/>
    			<input type="hidden" name="idp" id="idp" value="<?php echo $this->_tpl_vars['idp']; ?>
"/>
			</div>
			Formato
			<select name="tf" id="tf">
    		<?php unset($this->_sections['catf']);
$this->_sections['catf']['name'] = 'catf';
$this->_sections['catf']['loop'] = is_array($_loop=$this->_tpl_vars['cf']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['catf']['show'] = true;
$this->_sections['catf']['max'] = $this->_sections['catf']['loop'];
$this->_sections['catf']['step'] = 1;
$this->_sections['catf']['start'] = $this->_sections['catf']['step'] > 0 ? 0 : $this->_sections['catf']['loop']-1;
if ($this->_sections['catf']['show']) {
    $this->_sections['catf']['total'] = $this->_sections['catf']['loop'];
    if ($this->_sections['catf']['total'] == 0)
        $this->_sections['catf']['show'] = false;
} else
    $this->_sections['catf']['total'] = 0;
if ($this->_sections['catf']['show']):

            for ($this->_sections['catf']['index'] = $this->_sections['catf']['start'], $this->_sections['catf']['iteration'] = 1;
                 $this->_sections['catf']['iteration'] <= $this->_sections['catf']['total'];
                 $this->_sections['catf']['index'] += $this->_sections['catf']['step'], $this->_sections['catf']['iteration']++):
$this->_sections['catf']['rownum'] = $this->_sections['catf']['iteration'];
$this->_sections['catf']['index_prev'] = $this->_sections['catf']['index'] - $this->_sections['catf']['step'];
$this->_sections['catf']['index_next'] = $this->_sections['catf']['index'] + $this->_sections['catf']['step'];
$this->_sections['catf']['first']      = ($this->_sections['catf']['iteration'] == 1);
$this->_sections['catf']['last']       = ($this->_sections['catf']['iteration'] == $this->_sections['catf']['total']);
?> 
    		<option 
    		<?php unset($this->_sections['datos']);
$this->_sections['datos']['name'] = 'datos';
$this->_sections['datos']['show'] = true;
$this->_sections['datos']['loop'] = 1;
$this->_sections['datos']['max'] = $this->_sections['datos']['loop'];
$this->_sections['datos']['step'] = 1;
$this->_sections['datos']['start'] = $this->_sections['datos']['step'] > 0 ? 0 : $this->_sections['datos']['loop']-1;
if ($this->_sections['datos']['show']) {
    $this->_sections['datos']['total'] = $this->_sections['datos']['loop'];
    if ($this->_sections['datos']['total'] == 0)
        $this->_sections['datos']['show'] = false;
} else
    $this->_sections['datos']['total'] = 0;
if ($this->_sections['datos']['show']):

            for ($this->_sections['datos']['index'] = $this->_sections['datos']['start'], $this->_sections['datos']['iteration'] = 1;
                 $this->_sections['datos']['iteration'] <= $this->_sections['datos']['total'];
                 $this->_sections['datos']['index'] += $this->_sections['datos']['step'], $this->_sections['datos']['iteration']++):
$this->_sections['datos']['rownum'] = $this->_sections['datos']['iteration'];
$this->_sections['datos']['index_prev'] = $this->_sections['datos']['index'] - $this->_sections['datos']['step'];
$this->_sections['datos']['index_next'] = $this->_sections['datos']['index'] + $this->_sections['datos']['step'];
$this->_sections['datos']['first']      = ($this->_sections['datos']['iteration'] == 1);
$this->_sections['datos']['last']       = ($this->_sections['datos']['iteration'] == $this->_sections['datos']['total']);
?>
    		<?php if ($this->_tpl_vars['forma'][$this->_sections['datos']['index']]['id_formatoSi'] == $this->_tpl_vars['cf'][$this->_sections['catf']['index']]['id_formatoSi']): ?>
    		selected="selected"
    		<?php endif; ?>
    		<?php endfor; endif; ?>
    		value="<?php echo $this->_tpl_vars['cf'][$this->_sections['catf']['index']]['id_formatoSi']; ?>
"
    		><?php echo $this->_tpl_vars['cf'][$this->_sections['catf']['index']]['formatoVc']; ?>
</option> 
    		<?php endfor; endif; ?>
    		</select>
    		<div id="promo" style="margin-top: 5px;">
    		<table >
    			<?php unset($this->_sections['pm']);
$this->_sections['pm']['name'] = 'pm';
$this->_sections['pm']['loop'] = is_array($_loop=$this->_tpl_vars['promo']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['pm']['show'] = true;
$this->_sections['pm']['max'] = $this->_sections['pm']['loop'];
$this->_sections['pm']['step'] = 1;
$this->_sections['pm']['start'] = $this->_sections['pm']['step'] > 0 ? 0 : $this->_sections['pm']['loop']-1;
if ($this->_sections['pm']['show']) {
    $this->_sections['pm']['total'] = $this->_sections['pm']['loop'];
    if ($this->_sections['pm']['total'] == 0)
        $this->_sections['pm']['show'] = false;
} else
    $this->_sections['pm']['total'] = 0;
if ($this->_sections['pm']['show']):

            for ($this->_sections['pm']['index'] = $this->_sections['pm']['start'], $this->_sections['pm']['iteration'] = 1;
                 $this->_sections['pm']['iteration'] <= $this->_sections['pm']['total'];
                 $this->_sections['pm']['index'] += $this->_sections['pm']['step'], $this->_sections['pm']['iteration']++):
$this->_sections['pm']['rownum'] = $this->_sections['pm']['iteration'];
$this->_sections['pm']['index_prev'] = $this->_sections['pm']['index'] - $this->_sections['pm']['step'];
$this->_sections['pm']['index_next'] = $this->_sections['pm']['index'] + $this->_sections['pm']['step'];
$this->_sections['pm']['first']      = ($this->_sections['pm']['iteration'] == 1);
$this->_sections['pm']['last']       = ($this->_sections['pm']['iteration'] == $this->_sections['pm']['total']);
?>
    			<tr>
    				<td><?php echo $this->_tpl_vars['promo'][$this->_sections['pm']['index']]['descripcionVc']; ?>
</td>
    		<td>
    			<input type="checkbox" name="c<?php echo $this->_tpl_vars['promo'][$this->_sections['pm']['index']]['id_promocionIn']; ?>
" id="c<?php echo $this->_tpl_vars['promo'][$this->_sections['pm']['index']]['id_promocionIn']; ?>
" 
    			<?php if ($this->_tpl_vars['promo'][$this->_sections['pm']['index']]['publicadoBi'] == '1'): ?>
                 checked
                 <?php else: ?>                
                 <?php endif; ?>
                 />
				<div id="d<?php echo $this->_tpl_vars['promo'][$this->_sections['pm']['index']]['id_promocionIn']; ?>
" 
				<?php if ($this->_tpl_vars['promo'][$this->_sections['pm']['index']]['publicadoBi'] == '1'): ?>
								 class="checkbox_selected"
								 <?php else: ?>
								 class="checkbox_no_selected"
								 <?php endif; ?>
				>&nbsp;</div>
				<input type="hidden" name="pe[]" id="pe[]" value="<?php echo $this->_tpl_vars['promo'][$this->_sections['pm']['index']]['id_promocionIn']; ?>
">
			</td>
			</tr>
			<?php endfor; endif; ?>
			</table>
			</div>
		</div>
		
	</div>
	<div class="contenedor-gris-blanco">
		<p class="instrucciones_cursivas">Secciones descriptivas</p>
		<table>
			
			<tr class="label_izq">
				<td>Titulo de sección</td>
				<td>Contenido</td>
			</tr>
			
			
			<tr class="label_izq">
				<td><input type="text" name="ts[]" id="ts[]" value="<?php echo $this->_tpl_vars['aThink'][0]['tituloVc']; ?>
" /></td>
				<td><textarea name="cont[]" id="cont[]"><?php echo $this->_tpl_vars['aThink'][0]['descripcionVc']; ?>
</textarea></td>
			</tr>
			
			<tr class="label_izq">
				<td></td>
				<td></td>
			</tr>
			
			<tr class="label_izq">
				<td><input type="text" name="ts[]" id="ts[]" value="<?php echo $this->_tpl_vars['aThink'][1]['tituloVc']; ?>
" /></td>
				<td><textarea name="cont[]" id="cont[]"><?php echo $this->_tpl_vars['aThink'][1]['descripcionVc']; ?>
</textarea></td>
			</tr>
			
			<tr class="label_izq">
				<td></td>
				<td></td>
			</tr>
			
			<tr class="label_izq">
				<td><input type="text" name="ts[]" id="ts[]" value="<?php echo $this->_tpl_vars['aThink'][2]['tituloVc']; ?>
" /></td>
				<td><textarea name="cont[]" id="cont[]"><?php echo $this->_tpl_vars['aThink'][2]['descripcionVc']; ?>
</textarea></td>
			</tr>
			
		</table>
	</div>
	<input type="button" name="cancel" id="cancel" value="" class="boton-cancel-menu" onclick="mimensaje()" style='font-size: 13px;' />
	<input type="submit" name="enviar" id="enviar" value="" class="boton-guardar-oc"  style='font-size: 13px;'/>		
</form>
</div>		