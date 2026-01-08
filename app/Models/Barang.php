<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class Barang extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'barang';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'harga',
        'stok',
        'kondisi',
        'kategori',
        'keterangan',
        'image',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'harga' => 'integer',
        'stok' => 'integer',
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'formatted_harga',
        'stock_status',
        'kondisi_badge',
    ];

    // ========================================
    // ACCESSORS (Getters)
    // ========================================

    /**
     * Get formatted price in Rupiah
     *
     * @return string
     */
    public function getFormattedHargaAttribute()
    {
        return 'Rp ' . number_format($this->harga, 0, ',', '.');
    }

    /**
     * Get stock status (success, warning, danger)
     *
     * @return string
     */
    public function getStockStatusAttribute()
    {
        if ($this->stok === 0) {
            return 'danger'; // Red - Out of stock
        } elseif ($this->stok < 5) {
            return 'warning'; // Yellow - Low stock
        } else {
            return 'success'; // Green - Available
        }
    }

    /**
     * Get kondisi badge color
     *
     * @return string
     */
    public function getKondisiBadgeAttribute()
    {
        return $this->kondisi === 'Baik' ? 'success' : 'warning';
    }

    /**
     * Get stock status label
     *
     * @return string
     */
    public function getStockLabelAttribute()
    {
        if ($this->stok === 0) {
            return 'Habis';
        } elseif ($this->stok < 5) {
            return 'Stok Rendah';
        } else {
            return 'Tersedia';
        }
    }

    /**
     * Get image URL
     *
     * @return string
     */
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/barang/' . $this->image);
        }
        return asset('img/no-image.jpg');
    }

    /**
     * Get harga per hari formatted
     *
     * @return string
     */
    public function getHargaPerHariAttribute()
    {
        return $this->formatted_harga . ' / hari';
    }

    // ========================================
    // MUTATORS (Setters)
    // ========================================

    /**
     * Set nama to title case
     *
     * @param string $value
     * @return void
     */
    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = ucwords(strtolower($value));
    }

    /**
     * Set harga (ensure positive integer)
     *
     * @param mixed $value
     * @return void
     */
    public function setHargaAttribute($value)
    {
        $this->attributes['harga'] = abs((int) $value);
    }

    /**
     * Set stok (ensure non-negative integer)
     *
     * @param mixed $value
     * @return void
     */
    public function setStokAttribute($value)
    {
        $this->attributes['stok'] = max(0, (int) $value);
    }

    // ========================================
    // QUERY SCOPES
    // ========================================

    /**
     * Scope query untuk barang yang tersedia (stok > 0 dan aktif)
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAvailable($query)
    {
        return $query->where('stok', '>', 0)->where('is_active', true);
    }

    /**
     * Scope query untuk barang dengan stok rendah
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $threshold
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLowStock($query, $threshold = 5)
    {
        return $query->where('stok', '>', 0)->where('stok', '<', $threshold);
    }

    /**
     * Scope query untuk barang habis
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOutOfStock($query)
    {
        return $query->where('stok', 0);
    }

    /**
     * Scope query untuk filter berdasarkan kategori
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $kategori
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByKategori($query, $kategori)
    {
        return $query->where('kategori', $kategori);
    }

    /**
     * Scope query untuk filter berdasarkan kondisi
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $kondisi
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByKondisi($query, $kondisi)
    {
        return $query->where('kondisi', $kondisi);
    }

    /**
     * Scope query untuk pencarian
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $keyword
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $keyword)
    {
        return $query->where(function($q) use ($keyword) {
            $q->where('nama', 'LIKE', "%{$keyword}%")
              ->orWhere('kategori', 'LIKE', "%{$keyword}%")
              ->orWhere('keterangan', 'LIKE', "%{$keyword}%");
        });
    }

    /**
     * Scope untuk barang aktif saja
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope untuk sorting berdasarkan nama
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $direction
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOrderByNama($query, $direction = 'asc')
    {
        return $query->orderBy('nama', $direction);
    }

    /**
     * Scope untuk sorting berdasarkan harga
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $direction
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOrderByHarga($query, $direction = 'asc')
    {
        return $query->orderBy('harga', $direction);
    }

    /**
     * Scope untuk sorting berdasarkan stok
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $direction
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOrderByStok($query, $direction = 'asc')
    {
        return $query->orderBy('stok', $direction);
    }

    // ========================================
    // HELPER METHODS
    // ========================================

    /**
     * Check if barang is available
     *
     * @return bool
     */
    public function isAvailable()
    {
        return $this->stok > 0 && $this->is_active;
    }

    /**
     * Check if stock is low
     *
     * @param int $threshold
     * @return bool
     */
    public function isLowStock($threshold = 5)
    {
        return $this->stok > 0 && $this->stok < $threshold;
    }

    /**
     * Check if out of stock
     *
     * @return bool
     */
    public function isOutOfStock()
    {
        return $this->stok === 0;
    }

    /**
     * Check if kondisi is good
     *
     * @return bool
     */
    public function isKondisiBaik()
    {
        return $this->kondisi === 'Baik';
    }

    /**
     * Decrease stock
     *
     * @param int $quantity
     * @return bool
     */
    public function decreaseStock($quantity = 1)
    {
        if ($this->stok >= $quantity) {
            $this->stok -= $quantity;
            $this->save();
            return true;
        }
        return false;
    }

    /**
     * Increase stock
     *
     * @param int $quantity
     * @return bool
     */
    public function increaseStock($quantity = 1)
    {
        $this->stok += $quantity;
        $this->save();
        return true;
    }

    /**
     * Set stock to specific value
     *
     * @param int $value
     * @return bool
     */
    public function setStock($value)
    {
        $this->stok = max(0, (int) $value);
        $this->save();
        return true;
    }

    /**
     * Toggle active status
     *
     * @return void
     */
    public function toggleActive()
    {
        $this->is_active = !$this->is_active;
        $this->save();
    }

    /**
     * Activate barang
     *
     * @return void
     */
    public function activate()
    {
        $this->is_active = true;
        $this->save();
    }

    /**
     * Deactivate barang
     *
     * @return void
     */
    public function deactivate()
    {
        $this->is_active = false;
        $this->save();
    }

    // ========================================
    // STATIC METHODS
    // ========================================

    /**
     * Get all available categories
     *
     * @return array
     */
    public static function getKategoriList()
    {
        return [
            'Tenda',
            'Sleeping Bag',
            'Carrier',
            'Kompor',
            'Peralatan Masak',
            'Perlengkapan',
            'Lainnya',
        ];
    }

    /**
     * Get all kondisi options
     *
     * @return array
     */
    public static function getKondisiList()
    {
        return [
            'Baik',
            'Perlu Perawatan',
        ];
    }

    /**
     * Get statistics
     *
     * @return array
     */
    public static function getStatistics()
    {
        return [
            'total' => self::count(),
            'tersedia' => self::where('stok', '>', 0)->count(),
            'stok_rendah' => self::where('stok', '>', 0)->where('stok', '<', 5)->count(),
            'habis' => self::where('stok', 0)->count(),
            'aktif' => self::where('is_active', true)->count(),
            'tidak_aktif' => self::where('is_active', false)->count(),
            'kondisi_baik' => self::where('kondisi', 'Baik')->count(),
            'perlu_perawatan' => self::where('kondisi', 'Perlu Perawatan')->count(),
        ];
    }

    /**
     * Get total value of all stock
     *
     * @return int
     */
    public static function getTotalValue()
    {
        return self::sum(DB::raw('harga * stok'));
    }

    // ========================================
    // BOOT METHOD
    // ========================================

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        // Event saat barang dibuat
        static::creating(function ($barang) {
            // Set default values jika perlu
            if (is_null($barang->is_active)) {
                $barang->is_active = true;
            }
        });
            static::updating(function ($barang) {
                if ($barang->isDirty('stok')) {
                    Log::info('Stok barang berubah', [
                        'barang_id' => $barang->id,
                        'nama' => $barang->nama,
                        'stok_lama' => $barang->getOriginal('stok'),
                        'stok_baru' => $barang->stok,
                    ]);
                }
            });

            static::deleting(function ($barang) {
                Log::info('Barang dihapus', [
                    'barang_id' => $barang->id,
                    'nama' => $barang->nama,
                ]);
            });
    }
}