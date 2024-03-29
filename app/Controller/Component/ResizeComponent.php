<?php
/**
 * Clase para redimensionamiento de imagenes con opciones para marca de agua.
 * 
 */

App::uses('Component', 'Controller');

class ResizeComponent extends Component {
    /**
     * nomre de imagen con camino completo dentro del servidor.
     *
     * @var string
     */
    protected $image;

    /**
     * Tipo da Imagem setado automaticamente (1 = GIF, 2 = JPG, 3 = PNG, 4 = SWF, 5 = PSD, 6 = BMP,
     * 7 = TIFF(intel byte order), 8 = TIFF(motorola byte order), 9 = JPC, 10 = JP2, 11 = JPX, 12 = JB2, 13 = SWC,
     * 14 = IFF, 15 = WBMP, 16 = XBM).
     * solo sirve tipos 1, 2 y 3.
     *
     * @var int
     */
    protected $imageType;

    /**
     * Tamanho vertical da imagem original.
     *
     * @var int
     */
    protected $height;

    /**
     * Tamanho horizontal da imagem original.
     *
     * @var int
     */
    protected $width;

    /**
     * Nome da imagem com seu caminho completo no servidor que ser� feita uma c�pia da original, para preservar a original.
     *
     * @var string
     */
    protected $newImage;
    
    /**
     * Novo tamanho vertical da imagem.
     *
     * @var int
     */
    protected $newHeight;

    /**
     * Novo tamanho horizontal da imagem.
     *
     * @var int
     */
    protected $newWidth;

    /**
     * Nome da imagem com seu caminho completo no servidor que ser� utilizada como marca d'�gua.
     *
     * @var string
     */
    protected $waterMarkImage;
    
    /**
     * Tipo da imagem da marca d'agua setado automaticamente (1 = GIF, 2 = JPG, 3 = PNG, 4 = SWF, 5 = PSD, 6 = BMP,
     * 7 = TIFF(intel byte order), 8 = TIFF(motorola byte order), 9 = JPC, 10 = JP2, 11 = JPX, 12 = JB2, 13 = SWC,
     * 14 = IFF, 15 = WBMP, 16 = XBM).
     * Somente ser�o aceitos os tipos 1, 2 e 3.
     *
     * @var int
     */
    protected $waterMarkImageType;
    
    /**
     * Tamanho vertical da marca d'agua.
     *
     * @var int
     */
    protected $waterMarkImageHeight;
    
    /**
     * Tamanho horizontal da marca d'agua.
     *
     * @var int
     */
    protected $waterMarkImageWidth;
    
    /**
     * Posi��o onde a marca d'agua ser� colocada.
     * Valores poder�o ser 'topLeft', 'topCenter', 'topRight', 'bottomLeft', 'bottomCenter', 'bottomRight' ou 'center'.
     *
     * @var string
     */
    protected $waterMarkPosition = 'bottomRight';
    
    /**
     * Opacidade da marca d'agua.
     * Valores de 0 a 100.
     *
     * @var integer
     */
    protected $waterMarkOpacity = 50;
    
    /**
     * 1 para redimensionar proporcionalmente a imagem, 0 para permitir distor��o.
     *
     * @var int
     */
    protected $proportional = 1;

    /**
     * H para redimensinar proporcionalmente a imagem com base na Horizontal, e V para redimensionar
     * proporcionalmente a imagem com base na Vertical.
     *
     * @var string
     */
    protected $proportionalFlag = 'H';

    /**
     * Numero de graus em que a imagem dever� ser rotacionada.
     * Valor de -360 a 360.
     *
     * @var int
     */
    protected $degrees = 0;

    /**
     * Cor da zona descoberta da imagem ap�s a rota��o.
     *
     * @var int
     */
    protected $bgColor = 0;
    
    /**
     * le da un toque de blur a la imagen final
     */

    public function blurimg($img){
    	
    	
    	
    }
    
    /**
     * Construtor
     *
     * @param string $image
     * @access public
     * @return boolean
     */
    public function img($image) {
        $this->setImage($image);

        return true;
    }

    /**
     * Seta uma nova imagem para ser tratada e pega as dimens�es dela junto com seu tipo.
     *
     * @param string $image
     * @access public
     */
    public function setImage($image) {
        $this->image = $image;

        try {
            $tmp = getimagesize($this->image);
            $this->width  = $tmp[0];
            $this->height  = $tmp[1];
            $this->imageType = $tmp[2];
        }
        catch (Exception $e) {
            throw new Exception("N�o foi poss�vel identificar o tamanho da imagem original.");
        }
    }

    /**
     * Retorna o caminho e nome da imagem atual.
     *
     * @return string
     * @access public
     */
    public function getImage() {
        return $this->image;
    }

    /**
     * Seta uma imagem para ser criada como c�pia da original.
     *
     * @param string $newImage
     * @access public
     */
    public function setNewImage($newImage) {
        $this->newImage = $newImage;
    }

    /**
     * Retorna o caminho e nome da imagem c�pia.
     *
     * @return string
     * @access public
     */
    public function getNewImage() {
        return $this->newImage;
    }
    
    /**
     * Seta uma imagem para ser utilizada como marca d'�gua.
     *
     * @param string $waterMarkImage
     * @access public
     */
    public function setWaterMarkImage($waterMarkImage) {
        $this->waterMarkImage = $waterMarkImage;
    }
    
    /**
     * Retorna o caminho e nome da imagem para marca d'�gua.
     *
     * @return string
     * @access public
     */
    public function getWaterMarkImage() {
        return $this->waterMarkImage;
    }
    
    /**
     * Seta a posi��o em que a marca d'agua aparecer� na imagem.
     *
     * @param string $waterMarkPosition
     * @access public
     */
    public function setWaterMarkPosition($waterMarkPosition) {
        if($waterMarkPosition == 'topLeft' || 
           $waterMarkPosition == 'topCenter' || 
           $waterMarkPosition == 'topRight' || 
           $waterMarkPosition == 'bottomLeft' || 
           $waterMarkPosition == 'bottomCenter' || 
           $waterMarkPosition == 'bottomRight' || 
           $waterMarkPosition == 'center') {
            $this->waterMarkPosition = $waterMarkPosition;
        }
        else {
            throw new Exception("Posi��o da marca d'agua � inv�lida.");
        }
    }
    
    /**
     * Retorna a posi��o em que a marca d'agua deve ser colocada.
     *
     * @return string
     * @access public
     */
    public function getWaterMarkPosition() {
        return $this->waterMarkPosition;
    }
    
    /**
     * Seta a opacidade da marca d'agua.
     * Valores de 0 a 100.
     *
     * @param int $waterMarkOpacity
     * @access public
     */
    public function setWaterMarkOpacity($waterMarkOpacity) {
        if($waterMarkOpacity >= 0 && $waterMarkOpacity <= 100) {
            $this->waterMarkOpacity = $waterMarkOpacity;
        }
        else {
            throw new Exception("Opacidade informada � inv�lida. Use valores de 0 a 100.");
        }
    }
    
    /**
     * Retorna a opacidade que a marca d'agua dever� ter.
     *
     * @return int
     * @access public
     */
    public function getWaterMarkOpacity() {
        return $this->waterMarkOpacity;
    }

    /**
     * Seta o tamanho para o qual a imagem (original ou c�pia) ser� redimensionada.
     *
     * @param int $newHeight
     * @param int $newWidth
     * @access public
     */
    public function setNewSize($newHeight, $newWidth) {
        $this->newHeight = $newHeight;
        $this->newWidth = $newWidth;
    }

    /**
     * 1 para redimensionar proporcionalmente a imagem, 0 para permitir distor��o.
     *
     * @param int $proportional
     * @access public
     */
    public function setProportional($proportional) {
        $this->proportional = $proportional;
    }

    /**
     * Retorna se � para ser proporcional ou n�o.
     *
     * @return integer
     * @access public
     */
    public function getProportional() {
        return $this->proportional;
    }

    /**
     * H para redimensinar proporcionalmente a imagem com base na Horizontal, e V para redimensionar
     * proporcionalmente a imagem com base na Vertical.
     *
     * @param string $proportionalFlag
     * @access public
     */
    public function setProportionalFlag($proportionalFlag) {
        $this->proportionalFlag = $proportionalFlag;
    }

    /**
     * Retorna a base pela qual ser� mantida a propor��o de redimensionamento.
     *
     * @return string
     * @access public
     */
    public function getProportionalFlag() {
        return $this->proportionalFlag;
    }
    
    /**
     * Seta quantos graus em que a imagem dever� ser rotacionada.
     * Valor de -360 a 360.
     *
     * @param int $degrees
     * @access public
     */
    public function setDegrees($degrees) {
        if($degrees > 360 || $degrees < -360) {
            throw new Exception("�ngulo informado incorreto. Valor aceito � de -360 a 360.");
        }
        $this->degrees = $degrees;
    }
    
    /**
     * Retorna o numero de graus em que a imagem dever� ser rotacionada.
     *
     * @return int
     * @access public
     */
    public function getDegrees() {
        return $this->degrees;
    }
    
    /**
     * Seta a cor de fundo que a zona descoberta da imagem, depois de rotacionada, dever� ter.
     *
     * @param int $bgColor
     * @access public
     */
    public function setBgColor($bgColor) {
        $this->bgColor = $bgColor;
    }
    
    /**
     * Retorna a cor de fundo que a zona descoberta da imagem, depois de rotacionada, dever� ter.
     *
     * @return int
     * @access public
     */
    public function getBgColor() {
        return $this->bgColor;
    }

    /**
     * Faz uma c�pia da imagem original e seta ela como $image para ser utilizada preservando a original.
     *
     * @return boolean
     * @access private
     * @uses setImage()
     * @uses getImage()
     * @uses setNewImage()
     * @uses getNewImage()
     */
    private function copyImage() {
        if(!empty($this->image) && !empty($this->newImage)) {
            if(!copy($this->getImage(), $this->getNewImage())) {
                throw new Exception("N�o foi poss�vel copiar o arquivo.");
            }
            else {
                $this->setImage($this->getNewImage());
                $this->setNewImage("");
                return true;
            }
        }
        else {
            throw new Exception("Erro. Verifique os atributos 'image' e 'newImage'.");
        }
    }
    
    /**
     * Verifica se todos os atributos necess�rios para o redimensionamento da imagem foram informados.
     * 
     * @access private
     */
    private function verifyAttributes() {
        if(empty($this->image)) {
            throw new Exception("Atributo 'image' n�o definido.");
        }
        if(empty($this->imageType)) {
            throw new Exception("Atributo 'imageType' n�o definido.");
        }
        if(empty($this->height)) {
            throw new Exception("Atributo 'height' n�o definido.");
        }
        if(empty($this->width)) {
            throw new Exception("Atributo 'width' n�o definido.");
        }
        if(empty($this->newHeight)) {
            throw new Exception("Atributo 'newHeight' n�o definido.");
        }
        if(empty($this->newWidth)) {
            throw new Exception("Atributo 'newWidth' n�o definido.");
        }
    }

    /**
     * Verifica se todos os atributos necess�rios para a imagem da marca d'agua foram informados.
     * 
     * @access private
     */
    private function verifyWaterMarkAttributes() {
        if(empty($this->waterMarkImage)) {
            throw new Exception("Atributo 'waterMarkImage' n�o definido.");
        }
        if(empty($this->waterMarkImageType)) {
            throw new Exception("Atributo 'waterMarkImageType' n�o definido.");
        }
        if(empty($this->waterMarkImageHeight)) {
            throw new Exception("Atributo 'waterMarkHeight' n�o definido.");
        }
        if(empty($this->waterMarkImageWidth)) {
            throw new Exception("Atributo 'waterMarkImageWidth' n�o definido.");
        }
    }

    /**
     * Redimensiona a imagem conforme configurado.
     *
     * @return boolean
     * @access public
     * @uses verifyAttributes()
     * @uses copyImage()
     * @uses getProportional()
     * @uses getProportionalFlag()
     * @uses getImage()
     * @uses getDegrees()
     * @uses getBgColor()
     * @uses getWaterMarkImage()
     * @uses getWaterMarkPosition()
     * @uses verifyWaterMarkAttributes()
     * @uses getWaterMarkOpacity();
     */
    public function make() {
        $this->verifyAttributes();
        
        /**
         * Faz a c�pia da imagem caso tenha sido informado um novo nome de arquivo em 'newImage'.
         */
        if(!empty($this->newImage)) {
            $this->copyImage();
        }
        
        /**
         * Calcula a Propor��o para o redimencionamento.
         */
        if($this->getProportional() == 1) {
            if($this->getProportionalFlag() == 'H') {
                /**
                 * Calcula o novo tamanho Vertical para ser proporcional.
                 */
                $this->newHeight = round(($this->newWidth * $this->height) / $this->width);
            }
            elseif($this->getProportionalFlag() == 'V') {
                /**
                 * Calcula o novo tamanho Horizontal para ser proporcional.
                 */
                $this->newWidth = round(($this->newHeight * $this->width) / $this->height);
            }
            else {
                throw new Exception("Valor incorreto no atributo 'proportionalFlag'.");
            }
        }
        elseif($this->getProportional() != 0) {
            throw new Exception("Valor incorreto no atributo 'proportional'.");
        }
        
        switch ($this->imageType) {
            case 1:
                $img    = imagecreatefromgif($this->getImage());
                $newImg = imagecreate($this->newWidth, $this->newHeight);
                break;
            case 2:
                $img    = imagecreatefromjpeg($this->getImage());
                $newImg = imagecreatetruecolor($this->newWidth, $this->newHeight);
//                 imagecopyresampled($newImg, $img, 0, 0, 0, 0, $this->newWidth, $this->newHeight, $this->width, $this->height);
                break;
            case 3:
                $img    = imagecreatefrompng($this->getImage());
                $newImg = imagecreatetruecolor($this->newWidth, $this->newHeight);
                break;
            default:
                throw new Exception("Tipo de imagem informado n�o � compat�vel.");
                break;
        }
        
        try {
            imagecopyresized($newImg, $img, 0, 0, 0, 0, $this->newWidth, $this->newHeight, $this->width, $this->height);
        }
        catch (Exception $e) {
            throw new Exception("N�o foi poss�vel redimensionar a imagem.");
        }
        
        /**
         * Gira a imagem.
         */
        if($this->getDegrees() != 0) {
            try {
                $newImg = imagerotate($newImg, $this->getDegrees(), $this->getBgColor());
                /**
                 * Pega os novos valores para 'newHeight' e 'newWidth'.
                 */
                $this->newWidth = imagesx($newImg);
                $this->newHeight = imagesy($newImg);
            }
            catch (Exception $e) {
                throw new Exception("N�o foi poss�vel rotacionar a imagem.");
            }
        }
        
        /**
         * Adicionar uma marca d'agua na imagem pronta.
         */
        if(!empty($this->waterMarkImage)) {
            try {
                $tmp = getimagesize($this->getWaterMarkImage());
                $this->waterMarkImageWidth  = $tmp[0];
                $this->waterMarkImageHeight = $tmp[1];
                $this->waterMarkImageType   = $tmp[2];
                
                if($this->waterMarkImageHeight > $this->newHeight || 
                   $this->waterMarkImageWidth  > $this->newWidth) {
                    throw new Exception("Marca d'agua � maior que imagem redimensionada.");
                }
            }
            catch (Exception $e) {
                throw new Exception("N�o foi poss�vel identificar o tamanho da imagem da marca d'agua.");
            }
            
            $this->verifyWaterMarkAttributes();
            
            switch ($this->waterMarkImageType) {
                case 1:
                    $markImg = imagecreatefromgif($this->getWaterMarkImage());
                    break;
                case 2:
                    $markImg = imagecreatefromjpeg($this->getWaterMarkImage());
                    break;
                case 3:
                    $markImg = imagecreatefrompng($this->getWaterMarkImage());
                    break;
                default:
                    throw new Exception("Tipo de imagem da marca d'agua informado n�o � compat�vel.");
                    break;
            }
            
            /**
             * Calcula a �rea onde ser� colocada a marca d'agua.
             */
            switch($this->getWaterMarkPosition()) {
                case 'topLeft':
                    $x = 10;
                    $y = 10;
                    break;
                case 'topCenter':
                    $x = round(($this->newWidth / 2) - ($this->waterMarkImageWidth / 2));
                    $y = 10;
                    break;
                case 'topRight':
                    $x = $this->newWidth - $this->waterMarkImageWidth - 10;
                    $y = 10;
                    break;
                case 'bottomLeft':
                    $x = 10;
                    $y = $this->newHeight - $this->waterMarkImageHeight - 10;
                    break;
                case 'bottomCenter':
                    $x = round(($this->newWidth / 2) - ($this->waterMarkImageWidth / 2));
                    $y = $this->newHeight - $this->waterMarkImageHeight - 10;
                    break;
                case 'bottomRight':
                    $x = $this->newWidth - $this->waterMarkImageWidth - 10;
                    $y = $this->newHeight - $this->waterMarkImageHeight - 10;
                    break;
                case 'center':
                    $x = round(($this->newWidth / 2) - ($this->waterMarkImageWidth / 2));
                    $y = round(($this->newHeight / 2) - ($this->waterMarkImageHeight / 2));
                    break;
                default:
                    $x = 10;
                    $y = 10;
            }
            
            /**
             * Adiciona a marca d'agua na imagem.
             */
            try {
                imagecopymerge($newImg, $markImg, $x, $y, 0, 0, $this->waterMarkImageWidth, $this->waterMarkImageHeight, $this->getWaterMarkOpacity());
            }
            catch (Exception $e) {
                throw new Exception("N�o foi poss�vel adicionar marca d'agua.");
            }
        }
        
        /**
         * Grava a imagem em arquivo.
         */
        try {
            switch ($this->imageType) {
            	case 1:
            		imagecopyresampled($newImg, $img, 0, 0, 0, 0, $this->newWidth, $this->newHeight, $this->width, $this->height);
            		imagegif($newImg, $this->getImage());
            		break;
            	case 2:
            		imagecopyresampled($newImg, $img, 0, 0, 0, 0, $this->newWidth, $this->newHeight, $this->width, $this->height);
            		imagejpeg($newImg, $this->getImage(), 90);
            		break;
            	case 3:
            		imagecopyresampled($newImg, $img, 0, 0, 0, 0, $this->newWidth, $this->newHeight, $this->width, $this->height);
            		imagepng($newImg, $this->getImage());
            		break;
            	default:
            	    throw new Exception("Tipo de imagem informado n�o � compat�vel.");
            		break;
            }
        }
        catch (Exception $e) {
            throw new Exception($e);
        }
        
        return true;
    }
}
?>