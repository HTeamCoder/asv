<?php

namespace backend\models;

use Yii;
use common\models\myFuncs;
/**
 * This is the model class for table "{{%hocvien}}".
 *
 * @property integer $id
 * @property string $ma
 * @property string $name
 * @property string $code
 * @property string $tentiengnhat
 * @property string $gioitinh
 * @property string $ngaysinh
 * @property integer $tuoi
 * @property string $diachi
 * @property string $dienthoai
 * @property string $dienthoaikhancap
 * @property string $tinhtranghonnhan
 * @property string $cmnd
 * @property string $ngaycap
 * @property string $kinhnghiemcv
 * @property string $sothich
 * @property string $chieucao
 * @property string $cannang
 * @property string $taythuan
 * @property string $daunguon
 * @property integer $thiluc
 * @property string $hinhxam
 * @property string $ngaynhaptruong
 * @property string $ngaykham
 * @property string $ghichuthetrang
 * @property integer $lop_id
 * @property integer $benhvien_id
 * @property integer $nhommau_id
 * @property integer $trinhdohocvan_id
 * @property integer $congtacvien_id
 * @property integer $loaidanhsach_id
 * @property integer $khuvuc_id
 * @property integer $noicap
 * @property integer $noihoctap
 * @property integer $noisinh
 *
 * @property Chitietdanhgia[] $chitietdanhgias
 * @property Donhangchitiet[] $donhangchitiets
 * @property Lopchitiet $lop
 * @property Benhvien $benhvien
 * @property Nhommau $nhommau
 * @property Trinhdohocvan $trinhdohocvan
 * @property Congtacvien $congtacvien
 * @property Loaidanhsach $loaidanhsach
 * @property Khuvuc $khuvuc
 * @property Khuvuc $noicap0
 * @property Khuvuc $noihoctap0
 * @property Khuvuc $noisinh0
 * @property Ketquahoctap[] $ketquahoctaps
 */
class Hocvien extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%hocvien}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ma', 'name', 'code', 'tentiengnhat', 'gioitinh', 'ngaysinh', 'tuoi', 'diachi', 'cmnd', 'ngaycap', 'kinhnghiemcv', 'sothich', 'chieucao', 'cannang', 'daunguon', 'thiluc', 'lop_id', 'nhommau_id', 'trinhdohocvan_id', 'congtacvien_id', 'loaidanhsach_id', 'khuvuc_id', 'noicap', 'noihoctap', 'noisinh'], 'required'],
            [['gioitinh', 'tinhtranghonnhan', 'kinhnghiemcv', 'taythuan', 'ghichuthetrang'], 'string'],
            [['ngaysinh', 'ngaycap', 'ngaynhaptruong', 'ngaykham'], 'safe'],
            [['tuoi', 'thiluc', 'lop_id', 'benhvien_id', 'nhommau_id', 'trinhdohocvan_id', 'congtacvien_id', 'loaidanhsach_id', 'khuvuc_id', 'noicap', 'noihoctap', 'noisinh'], 'integer'],
            [['ma', 'code', 'tentiengnhat', 'sothich', 'daunguon'], 'string', 'max' => 255],
            [['name'], 'string', 'max' => 100],
            [['diachi'], 'string', 'max' => 500],
            [['dienthoai', 'dienthoaikhancap', 'cmnd', 'chieucao', 'cannang', 'hinhxam'], 'string', 'max' => 45],
            [['lop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lopchitiet::className(), 'targetAttribute' => ['lop_id' => 'id']],
            [['benhvien_id'], 'exist', 'skipOnError' => true, 'targetClass' => Benhvien::className(), 'targetAttribute' => ['benhvien_id' => 'id']],
            [['nhommau_id'], 'exist', 'skipOnError' => true, 'targetClass' => Nhommau::className(), 'targetAttribute' => ['nhommau_id' => 'id']],
            [['trinhdohocvan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Trinhdohocvan::className(), 'targetAttribute' => ['trinhdohocvan_id' => 'id']],
            [['congtacvien_id'], 'exist', 'skipOnError' => true, 'targetClass' => Congtacvien::className(), 'targetAttribute' => ['congtacvien_id' => 'id']],
            [['loaidanhsach_id'], 'exist', 'skipOnError' => true, 'targetClass' => Loaidanhsach::className(), 'targetAttribute' => ['loaidanhsach_id' => 'id']],
            [['khuvuc_id'], 'exist', 'skipOnError' => true, 'targetClass' => Khuvuc::className(), 'targetAttribute' => ['khuvuc_id' => 'id']],
            [['noicap'], 'exist', 'skipOnError' => true, 'targetClass' => Khuvuc::className(), 'targetAttribute' => ['noicap' => 'id']],
            [['noihoctap'], 'exist', 'skipOnError' => true, 'targetClass' => Khuvuc::className(), 'targetAttribute' => ['noihoctap' => 'id']],
            [['noisinh'], 'exist', 'skipOnError' => true, 'targetClass' => Khuvuc::className(), 'targetAttribute' => ['noisinh' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'ma' => Yii::t('app', 'Mã HV'),
            'name' => Yii::t('app', 'Tên HV'),
            'code' => Yii::t('app', 'Code'),
            'tentiengnhat' => Yii::t('app', 'Tên tiếng nhật'),
            'gioitinh' => Yii::t('app', 'Giới tính'),
            'ngaysinh' => Yii::t('app', 'Ngày tháng năm sinh'),
            'tuoi' => Yii::t('app', 'Tuổi'),
            'diachi' => Yii::t('app', 'Địa chỉ'),
            'dienthoai' => Yii::t('app', 'Điện thoại'),
            'dienthoaikhancap' => Yii::t('app', 'Điện thoại trong trường hợp khẩn cấp'),
            'tinhtranghonnhan' => Yii::t('app', 'Tình trạng hôn nhân'),
            'cmnd' => Yii::t('app', 'Chứng minh nhân dân'),
            'ngaycap' => Yii::t('app', 'Ngày cấp'),
            'kinhnghiemcv' => Yii::t('app', 'Kinh nghiệm CV'),
            'sothich' => Yii::t('app', 'Sở thích'),
            'chieucao' => Yii::t('app', 'Chiều cao'),
            'cannang' => Yii::t('app', 'Cân nặng'),
            'taythuan' => Yii::t('app', 'Tay thuận'),
            'daunguon' => Yii::t('app', 'Đầu nguồn'),
            'thiluc' => Yii::t('app', 'Thị lực'),
            'hinhxam' => Yii::t('app', 'Hình xăm'),
            'ngaynhaptruong' => Yii::t('app', 'Ngaynhaptruong'),
            'ngaykham' => Yii::t('app', 'Ngày khám'),
            'ghichuthetrang' => Yii::t('app', 'Ghi chú thể trạng'),
            'lop_id' => Yii::t('app', 'Lớp'),
            'benhvien_id' => Yii::t('app', 'Bệnh viện'),
            'nhommau_id' => Yii::t('app', 'Nhommau ID'),
            'trinhdohocvan_id' => Yii::t('app', 'Trình độ học vấn'),
            'congtacvien_id' => Yii::t('app', 'Cộng tác viên'),
            'loaidanhsach_id' => Yii::t('app', 'Loại danh sách'),
            'khuvuc_id' => Yii::t('app', 'Khuvuc ID'),
            'noicap' => Yii::t('app', 'Noicap'),
            'noihoctap' => Yii::t('app', 'Noihoctap'),
            'noisinh' => Yii::t('app', 'Noisinh'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChitietdanhgias()
    {
        return $this->hasMany(Chitietdanhgia::className(), ['hocvien_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDonhangchitiets()
    {
        return $this->hasMany(Donhangchitiet::className(), ['hocvien_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLop()
    {
        return $this->hasOne(Lopchitiet::className(), ['id' => 'lop_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBenhvien()
    {
        return $this->hasOne(Benhvien::className(), ['id' => 'benhvien_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNhommau()
    {
        return $this->hasOne(Nhommau::className(), ['id' => 'nhommau_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrinhdohocvan()
    {
        return $this->hasOne(Trinhdohocvan::className(), ['id' => 'trinhdohocvan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCongtacvien()
    {
        return $this->hasOne(Congtacvien::className(), ['id' => 'congtacvien_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoaidanhsach()
    {
        return $this->hasOne(Loaidanhsach::className(), ['id' => 'loaidanhsach_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKhuvuc()
    {
        return $this->hasOne(Khuvuc::className(), ['id' => 'khuvuc_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoicap0()
    {
        return $this->hasOne(Khuvuc::className(), ['id' => 'noicap']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoihoctap0()
    {
        return $this->hasOne(Khuvuc::className(), ['id' => 'noihoctap']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoisinh0()
    {
        return $this->hasOne(Khuvuc::className(), ['id' => 'noisinh']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKetquahoctaps()
    {
        return $this->hasMany(Ketquahoctap::className(), ['hocvien_id' => 'id']);
    }

    public function beforeSave($insert)
    {
        $this->code = myFuncs::createCode($this->name);
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }
}